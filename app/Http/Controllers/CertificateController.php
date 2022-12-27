<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Assistance;
use App\Models\Student;
use App\Models\Template;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Carbon\Carbon;
use setasign\Fpdi\Fpdi;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class CertificateController extends Controller
{
    public function create($id){
        $training = Training::findOrFail($id);
        $assistances = Assistance::where('training_id', $id)->with('training','student')->orderBy('assistance_payment', 'Asc')->get();
        return view ('training.certificate.addcertificate', compact('assistances','training'));
    }

    public function fillPDF($file, $outputFile, $student_fullname, $certificate_number)
    {
        $fpdi = new FPDI;
        // merger operations
        $count = $fpdi->setSourceFile($file);
        for ($i=1; $i<=$count; $i++) {
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = 80;
            $top = 90;
            $left2 = 230;
            $top2 = 60;
            $text = $student_fullname;
            $text2 = $certificate_number;
            $fpdi->SetFont("Arial", "B", 20);
            $fpdi->SetTextColor(0,0,0);
            $fpdi->Text($left, $top, $text);
            $fpdi->SetFont("Arial", "B", 13);
            $fpdi->SetTextColor(255,0,0);
            $fpdi->Text($left2, $top2, $text2);
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function codeQr($file_path, $qr_path){
        $url = 'https://industrialuagrm.net/documents/'.$file_path;
        QrCode::format('png')->size(300)->generate($url, Storage::disk('images')->path($qr_path));
        //QrCode::format('png')->mergeString(Storage::get('path/to/image.png'), .3)->generate();
    }

    public function makepath($student_lastname, $student_name, $training_name){
        $student_fullname = strtoupper($student_lastname.''.$student_name);
        $student_fullname = str_replace(' ', '', $student_fullname); 
        $name_document = $student_fullname.'-'.str_replace(' ', '', $training_name);
        $qr_path = 'CodeQr/'.$name_document.'.png';
        $file_path = 'certificates/'.$name_document.'.pdf';
        return [$qr_path, $file_path];
    }

    public function savecertificate($certificate_number, $file_path, $qr_path, $student_id, $template_id){
        $certificate = new Certificate;
        $certificate->certificate_number = $certificate_number;
        $certificate->certificate_document = $file_path;
        $certificate->certificate_qr = $qr_path;
        $certificate->student_id = $student_id;
        $certificate->template_id = $template_id;
        $certificate->save();
    }

    public function store (Request $request, $training_id, $student_id){
        $validated = $request->validate([
            'certificate_number' => 'required|unique:certificates',
        ]);
            //recogiendo datos
            $training = Training::where('id', $training_id)->first();
            $templatedocu = Template::where('training_id', $training_id)->first();
            $student = Student::where('id', $student_id)->first();
        if (DB::table('certificates')->where('student_id', $student_id)->where('template_id', $templatedocu->id)->doesntExist()) {
            //preparando variables para editar y almacenar PDF
            $path = $this->makepath($student->student_lastname, $student->student_name, $training->training_name);
            $qr_path = $path[0];
            $file_path = $path[1];
            $outputFile = Storage::disk('documents')->path($file_path);
            $student_fullname = strtoupper($student->student_lastname.' '.$student->student_name);
            $certificate_number = 'Nro '.$request->certificate_number;
            //run other function up
            $this->fillPDF(Storage::disk('documents')->path($templatedocu->template_document), $outputFile, $student_fullname, $certificate_number);
            $this->codeQr($file_path, $qr_path);
            //insertando a la BD
            $this->savecertificate($request->certificate_number, $file_path, $qr_path, $student_id, $templatedocu->id);
            alert()->success('Certificado Creado','Mostrando Código Qr')->position('top-end')->autoclose(2000);
            return back();
        }
        alert()->error('El Certificado ya Existe','Elimine el actual')->position('top-end')->autoclose(2000);
        return back();
    }

    public static function sendmessage($student_number, $training_name, $file_path){
        $sms = 'https://wa.me/+591'.$student_number.'?text=Hola,%20somos%20del%20equipo%20de%20ing%20industrial,%20para%20obtener%20tu%20certificado%20digital%20del%20'.$training_name.'%20dirigite%20al%20siguiente%20enlace:%20https://industrialuagrm.net/documents/'.$file_path.'%20y%20descarga%20el%20còdigo%20QR';
        return $sms;    
    }

    /*public static function pathQR($training_name, $student_lastname, $student_name){
        $student_fullname = strtoupper($student_lastname.''.$student_name);
        $student_fullname = str_replace(' ', '', $student_fullname); 
        $name_document = $student_fullname.'-'.str_replace(' ', '', $training_name);
        $qr_path = 'CodeQr/'.$name_document.'.png';
        return $qr_path;
    }*/

    public function allpdf($training_id){
        $training = Training::findOrFail($training_id);
        $template = Template::where('training_id', $training_id)->first();
        //$certificates = Certificate::where('template_id', $template->id)->orderBy('certificate_number', 'Asc')->get();
        $certificates = DB::table('certificates')
            ->where('template_id', $template->id)
            ->join('students', 'certificates.student_id', '=', 'students.id')
            ->select('certificates.*', 'students.student_name' ,'students.student_lastname','students.student_register')
            ->orderBy('students.student_lastname', 'Asc')
            ->get();
        $fecha = Carbon::now();
        $cantidad = count($certificates);   
        $pdf = PDF::loadView('training.certificate.staticpdf', compact('training','certificates','fecha','cantidad'));
        return $pdf->download($training->training_name.'.pdf');
    }

    public function destroy($training_id, $student_id){
        $template = Template::where('training_id', $training_id)->first();
        $certificate = Certificate::where('student_id', $student_id)->where('template_id', $template->id)->first();
        //dd($certificate->certificate_document, $certificate->certificate_qr); die();
        Storage::disk('documents')->delete($certificate->certificate_document);
        Storage::disk('images')->delete($certificate->certificate_qr);
        $certificate->delete();
        alert()->success('Certificado Eliminado','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

}
