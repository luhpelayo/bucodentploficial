<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\TomoController;
use App\Http\Controllers\ActaController;
use App\Http\Controllers\DirectActaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\InvestigationController;
use App\Http\Controllers\InvestigationTraceController;
use App\Http\Controllers\LaboratoryPhotoController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\InstructionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\NationalController;
use App\Http\Controllers\InternationalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ActaDirectReportController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CertificateController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/foo', function () {
    Artisan::call('storage:link');
});


Route::middleware(['auth'])->group(function () {

    //Vistas principales de cada modulo
    //portal principal
    Route::get('/portal', function(){
        return view('auth.portal');
    })->name('portal.index');
    
    //modulo estudiante
    Route::get('/portal/students', function(){
        return view('student.principal');
    })->name('std.index');

    //modulo egresados
    Route::get('/portal/graduates', function(){
        return view('graduated.principal');
    })->name('grad.index');

    //sub-modulo categorias
    Route::get('/portal/graduates/categories', function(){
        return view('graduated.category.principal');
    })->name('categ.index');

    //sub-modulo modalidades
    Route::get('/portal/graduates/modalities', function(){
        return view('graduated.modality.principal');
    })->name('modal.index');

    //sub modulo tomo
    Route::get('/portal/graduates/tomos', function(){
        return view('graduated.tomos.principal');
    })->name('tomo.index');

    //sub modulo Actas
    Route::get('/portal/graduates/actas', function(){
        return view('graduated.principalacta');
    })->name('actas.index');

    // sub modulo actas de defensa
    Route::get('/portal/graduates/actas/actasDefense', function(){
        return view('graduated.actadefense.principal');
    })->name('actaDefense.index');

    // sub modulo actas directas
    Route::get('/portal/graduates/actas/actasDirect', function(){
        return view('graduated.actadirect.principal');
    })->name('actaDirect.index');
    
    //modulo practicas
    Route::get('/portal/industrial-practices', function(){
        return view('practiceind.principal');
    })->name('prac.index');

    //modulo laboratorios
    Route::get('/portal/laboratory', function(){
        return view('laboratory.principal');
    })->name('lab.index');

    //sub modulo guias
    Route::get('/portal/laboratory/guides', function(){
        return view('laboratory.guides.principal');
    })->name('gui.index');

    //sub modulo investigacion
    Route::get('/portal/laboratory/investigation', function(){
        return view('laboratory.investigation.principal');
    })->name('inv.index');

    //sub modulo fotos de laboratorios
    Route::get('/portal/laboratory/photos', function(){
        return view('laboratory.photos.principal');
    })->name('pho.index');

    //modulo visitas
    Route::get('/portal/technical-visits', function(){
        return view('visits.principal');
    })->name('visit.index');

    //modulo documentos
    Route::get('/portal/documents', function(){
        return view('docus.principal');
    })->name('doc.index');

    //sub modulo areas
    Route::get('/portal/documents/areas', function(){
        return view('docus.area.principal');
    })->name('area.index');

    //sub modulo cartas
    Route::get('/portal/documents/letters', function(){
        return view('docus.letter.principal');
    })->name('lett.index');

    //sub modulo procedimientos
    Route::get('/portal/documents/procedures', function(){
        return view('docus.procedure.principal');
    })->name('proc.index');

    //sub modulo instructivos
    Route::get('/portal/documents/instructions', function(){
        return view('docus.instruction.principal');
    })->name('inst.index');

    //sub modulo programas analiticos
    Route::get('/portal/documents/programs-analitics', function(){
        return view('docus.program.principal');
    })->name('prog.index');

    //sub modulo funciones del personal
    Route::get('/portal/documents/functions', function(){
        return view('docus.orgchar.principal');
    })->name('func.index');

    //modulo convenios
    Route::get('/portal/agreement', function(){
        return view('agreement.principal');
    })->name('agre.index');

    //sub modulo convenios nacional
    Route::get('/portal/agreement/national', function(){
        return view('agreement.national.principal');
    })->name('nat.index');

    //sub modulo convenios internacional
    Route::get('/portal/agreement/international', function(){
        return view('agreement.international.principal');
    })->name('inter.index');

    // Modulo de cursos o talleres
    Route::get('/portal/training', function(){
        return view('training.principal');
    })->name('tra.index');

    // Modulo de Seguimiento a graduados
    Route::get('/portal/tracking', function(){
        return view('tracking.principal');
    })->name('track.index');

    // sub Modulo de Seguimiento academico a graduados
    Route::get('/portal/tracking/academic', function(){
        return view('tracking.academic.principal');
    })->name('acad.index');

    // sub Modulo de Seguimiento laboral a graduados
    Route::get('/portal/tracking/work', function(){
        return view('tracking.work.principal');
    })->name('work.index');

    // sub Modulo de Seguimiento cultural a graduados
    Route::get('/portal/tracking/culture', function(){
        return view('tracking.culture.principal');
    })->name('cult.index');

    // sub Modulo de Curriculum CV
    Route::get('/portal/tracking/curriculum', function(){
        return view('tracking.curriculum.principal');
    })->name('curri.index');
    
    // Modulo de Reportes
    Route::get('/portal/reports', function(){
        return view('report.principal');
    })->name('report.index');

    // Modulo de Reportes dinamicos
    Route::get('/portal/reports/dynamic', function(){
        return view('report.dynamic.principal');
    })->name('dyna.index');

    //reportes dinamicos graduados
    Route::get('/portal/reports/dynamic/graduated', function(){
        return view('report.dynamic.graduated.principal');
    })->name('dynagra.index');

    //reportes dinamicos laboratorio
    Route::get('/portal/reports/dynamic/laboratory', function(){
        return view('report.dynamic.laboratory.principal');
    })->name('dynalab.index');

    //reportes dinamicos documentos
    Route::get('/portal/reports/dynamic/documents', function(){
        return view('report.dynamic.documents.principal');
    })->name('dynadoc.index');

    //reportes dinamicos convenios
    Route::get('/portal/reports/dynamic/agreements', function(){
        return view('report.dynamic.agreement.principal');
    })->name('dynagre.index');

    //reportes dinamicos seguimientos
    Route::get('/portal/reports/dynamic/tracking', function(){
        return view('report.dynamic.tracking.principal');
    })->name('dynatracking.index');

    // pagina en construccion
    Route::get('/portal/construccion', function(){
        return view('construccion');
    })->name('construccion.index');

    Route::get('/logout', [SessionsController::class, 'destroy'])->name('login.destroy');
    //rutas de usuario
    Route::get('/portal/edituser', [RegisterController::class, 'edit'])->name('user.edit');
    Route::put('/upduser', [RegisterController::class, 'update'])->name('user.update');
    Route::get('/portal/editpassword', [RegisterController::class, 'editpassword'])->name('pass.edit');
    Route::put('/upduserpass', [RegisterController::class, 'updatepassword'])->name('pass.update');

    //rutas de estudiantes
    Route::get('/portal/students/add-student', [StudentController::class, 'create'])->name('student.create');
    Route::post('/portal/add-student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/portal/students/show-students', [StudentController::class, 'show'])->name('student.show');
    Route::get('/portal/editar/{id}/student', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/portal/updstudent/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/portal/delstudent/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/portal/students/pdf-students', [StudentController::class, 'allpdf'])->name('student.pdf');
    Route::get('/portal/students/excel-students', [StudentController::class, 'allexcel'])->name('student.excel');
    //ruta de reportes de estudiantes
    Route::get('/portal/reports/dynamic/student', [StudentController::class, 'report'])->name('student.report');
    Route::post('/portal/query-student', [StudentController::class, 'query'])->name('student.query');

    //rutas de categorias
    Route::get('/portal/graduates/categories/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/portal/add-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/portal/graduates/categories/show-categories', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/portal/graduates/categories/editar/{id}/category', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/portal/updcategory/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/portal/delcategory/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/portal/categories/pdf-categories', [CategoryController::class, 'allpdf'])->name('category.pdf');
    Route::get('/portal/categories/excel-categories', [CategoryController::class, 'allexcel'])->name('category.excel');

    //rutas de Modalidades
    Route::get('/portal/graduates/modalities/add-modality', [ModalityController::class, 'create'])->name('modality.create');
    Route::post('/portal/add-modality', [ModalityController::class, 'store'])->name('modality.store');
    Route::get('/portal/graduates/modalities/show-modalities', [ModalityController::class, 'show'])->name('modality.show');
    Route::get('/portal/graduates/modalities/editar/{id}/modality', [ModalityController::class, 'edit'])->name('modality.edit');
    Route::put('/portal/updmodality/{id}', [ModalityController::class, 'update'])->name('modality.update');
    Route::delete('/portal/delmodality/{id}', [ModalityController::class, 'destroy'])->name('modality.destroy');
    Route::get('/portal/modalities/pdf-modalities', [ModalityController::class, 'allpdf'])->name('modality.pdf');
    Route::get('/portal/modalities/excel-modalities', [ModalityController::class, 'allexcel'])->name('modality.excel');

    //rutas de Tomos
    Route::get('/portal/graduates/tomos/add-tomo', [TomoController::class, 'create'])->name('tomo.create');
    Route::post('/portal/add-tomo', [TomoController::class, 'store'])->name('tomo.store');
    Route::get('/portal/graduates/tomos/show-tomos', [TomoController::class, 'show'])->name('tomo.show');
    Route::get('/portal/graduates/tomos/editar/{id}/tomo', [TomoController::class, 'edit'])->name('tomo.edit');
    Route::put('/portal/updtomo/{id}', [TomoController::class, 'update'])->name('tomo.update');
    Route::delete('/portal/deltomo/{id}', [TomoController::class, 'destroy'])->name('tomo.destroy');
    Route::get('/portal/tomos/pdf-tomos', [TomoController::class, 'allpdf'])->name('tomo.pdf');
    Route::get('/portal/tomos/excel-tomos', [TomoController::class, 'allexcel'])->name('tomo.excel');
    //rutas de reportes de tomos
    Route::get('/portal/reports/dynamic/graduated/tomos', [TomoController::class, 'report'])->name('tomo.report');
    Route::post('/portal/query-tomos', [TomoController::class, 'query'])->name('tomo.query');

    //rutas de Actas de Defensa
    Route::get('/portal/graduates/actas-defense/add-acta', [ActaController::class, 'create'])->name('actadef.create');
    Route::post('/portal/add-acta', [ActaController::class, 'store'])->name('actadef.store');
    Route::get('/portal/graduates/actas-defense/show-actas', [ActaController::class, 'show'])->name('actadef.show');
    Route::get('/portal/graduates/actas-defense/editar/{id}/acta', [ActaController::class, 'edit'])->name('actadef.edit');
    Route::put('/portal/updacta/{id}', [ActaController::class, 'update'])->name('actadef.update');
    Route::delete('/portal/delacta/{id}', [ActaController::class, 'destroy'])->name('actadef.destroy');
    Route::get('/portal/actas/pdf-actas', [ActaController::class, 'allpdf'])->name('actadef.pdf');
    Route::get('/portal/actas/excel-actas', [ActaController::class, 'allexcel'])->name('actadef.excel');
    Route::get('/portal/actas/auxiliar', [ActaController::class, 'auxiliar'])->name('actadef.auxiliar');
    //rutas de reportes de actas directas
    Route::get('/portal/reports/dynamic/graduated/defense-acta', [ActaController::class, 'report'])->name('actadef.report');
    Route::post('/portal/query-defense-acta', [ActaController::class, 'query'])->name('actadef.query');

    //rutas de Actas Directas
    Route::get('/portal/graduates/actas-direct/add-acta', [DirectActaController::class, 'create'])->name('actadir.create');
    Route::post('/portal/add-actad', [DirectActaController::class, 'store'])->name('actadir.store');
    Route::get('/portal/graduates/actas-direct/show-actas', [DirectActaController::class, 'show'])->name('actadir.show');
    Route::get('/portal/graduates/actas-direct/editar/{id}/acta', [DirectActaController::class, 'edit'])->name('actadir.edit');
    Route::put('/portal/updactad/{id}', [DirectActaController::class, 'update'])->name('actadir.update');
    Route::delete('/portal/delactad/{id}', [DirectActaController::class, 'destroy'])->name('actadir.destroy');
    Route::get('/portal/actas/pdf-actasd', [DirectActaController::class, 'allpdf'])->name('actadir.pdf');
    Route::get('/portal/actas/excel-actasd', [DirectActaController::class, 'allexcel'])->name('actadir.excel');
    //rutas de reportes de actas directas
    Route::get('/portal/reports/dynamic/graduated/direct-acta', [DirectActaController::class, 'report'])->name('actadir.report');
    Route::post('/portal/query-direct-acta', [DirectActaController::class, 'query'])->name('actadir.query');
    
    //rutas de Empresa
    Route::get('/portal/industrial-practices/add-company', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/portal/add-company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/portal/industrial-practices/show-companies', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/portal/industrial-practices/editar/{id}/company', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/portal/updcompany/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/portal/delcompany/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::get('/portal/industrial-practices/pdf-companies', [CompanyController::class, 'allpdf'])->name('company.pdf');
    Route::get('/portal/industrial-practices/excel-companies', [CompanyController::class, 'allexcel'])->name('company.excel');

    //ruta de Practicas Ind
    Route::get('/portal/industrial-practices/add-practice', [PracticeController::class, 'create'])->name('practice.create');
    Route::post('/portal/add-practice', [PracticeController::class, 'store'])->name('practice.store');
    Route::get('/portal/industrial-practices/show-practices', [PracticeController::class, 'show'])->name('practice.show');
    Route::get('/portal/industrial-practices/editar/{id}/practice', [PracticeController::class, 'edit'])->name('practice.edit');
    Route::put('/portal/updpractice/{id}', [PracticeController::class, 'update'])->name('practice.update');
    Route::delete('/portal/delpractice/{id}', [PracticeController::class, 'destroy'])->name('practice.destroy');
    Route::get('/portal/industrial-practices/pdf-practices', [PracticeController::class, 'allpdf'])->name('practice.pdf');
    Route::get('/portal/industrial-practices/excel-practices', [PracticeController::class, 'allexcel'])->name('practice.excel');
    Route::get('/portal/industrial-practices/auxiliar', [PracticeController::class, 'auxiliar'])->name('practice.auxiliar');
    //rutas de reportes de practicas ind
    Route::get('/portal/reports/dynamic/practices', [PracticeController::class, 'report'])->name('practice.report');
    Route::post('/portal/query-practices', [PracticeController::class, 'query'])->name('practice.query');

    //rutas de Guias
    Route::get('/portal/laboratory/guides/add-guide', [GuideController::class, 'create'])->name('guide.create');
    Route::post('/portal/add-guide', [GuideController::class, 'store'])->name('guide.store');
    Route::get('/portal/laboratory/guides/show-guides', [GuideController::class, 'show'])->name('guide.show');
    Route::get('/portal/laboratory/guides/editar/{id}/guide', [GuideController::class, 'edit'])->name('guide.edit');
    Route::put('/portal/updguide/{id}', [GuideController::class, 'update'])->name('guide.update');
    Route::delete('/portal/delguide/{id}', [GuideController::class, 'destroy'])->name('guide.destroy');
    Route::get('/portal/laboratory/pdf-guides', [GuideController::class, 'allpdf'])->name('guide.pdf');
    Route::get('/portal/laboratory/excel-guides', [GuideController::class, 'allexcel'])->name('guide.excel');
    //rutas de reportes de guias de materias
    Route::get('/portal/reports/dynamic/laboratory/guides', [GuideController::class, 'report'])->name('guide.report');
    Route::post('/portal/query-guides', [GuideController::class, 'query'])->name('guide.query');

    //rutas de Investigacion
    Route::get('/portal/laboratory/investigation/add-investigation', [InvestigationController::class, 'create'])->name('investigation.create');
    Route::post('/portal/add-investigation', [InvestigationController::class, 'store'])->name('investigation.store');
    Route::get('/portal/laboratory/investigation/show-investigations', [InvestigationController::class, 'show'])->name('investigation.show');
    Route::get('/portal/laboratory/investigation/editar/{id}/investigation', [InvestigationController::class, 'edit'])->name('investigation.edit');
    Route::put('/portal/updinvestigation/{id}', [InvestigationController::class, 'update'])->name('investigation.update');
    Route::delete('/portal/delinvestigation/{id}', [InvestigationController::class, 'destroy'])->name('investigation.destroy');
    Route::get('/portal/laboratory/pdf-investigations', [InvestigationController::class, 'allpdf'])->name('investigation.pdf');
    Route::get('/portal/laboratory/excel-investigations', [InvestigationController::class, 'allexcel'])->name('investigation.excel');
    //rutas de reportes de investigacion
    Route::get('/portal/reports/dynamic/laboratory/investigation', [InvestigationController::class, 'report'])->name('investigation.report');
    Route::post('/portal/query-investigation', [InvestigationController::class, 'query'])->name('investigation.query');

    //rutas de Seguimiento de  Investigacion
    Route::get('/portal/laboratory/investigation/add-trace-investigation', [InvestigationTraceController::class, 'create'])->name('investigationtrace.create');
    Route::post('/portal/add-trace-investigation', [InvestigationTraceController::class, 'store'])->name('investigationtrace.store');
    Route::get('/portal/laboratory/investigation/show-trace-investigations', [InvestigationTraceController::class, 'show'])->name('investigationtrace.show');
    Route::delete('/portal/delinvestigationtrace/{id}', [InvestigationTraceController::class, 'destroy'])->name('investigationtrace.destroy');
    Route::get('/portal/laboratory/trace/auxiliar', [InvestigationTraceController::class, 'auxiliar'])->name('investigationtrace.auxiliar');
    Route::get('/portal/laboratory/investigation/files/{id}/investigation', [InvestigationTraceController::class, 'addfiles'])->name('investigationtrace.files');
    Route::post('/portal/add-trace-investigation/{id}', [InvestigationTraceController::class, 'storefiles'])->name('investigationtrace.storefiles');
    Route::get('/portal/laboratory/investigation/show-trace-images/{id}', [InvestigationTraceController::class, 'showimages'])->name('investigationtrace.showimages');
    Route::get('/portal/laboratory/investigation/show-trace-pdfs/{id}', [InvestigationTraceController::class, 'showpdfs'])->name('investigationtrace.showpdfs');
    Route::delete('/portal/delinvestigation-image/{id}', [InvestigationTraceController::class, 'destroyimage'])->name('investigationtrace.destroyimage');
    Route::delete('/portal/delinvestigation-pdf/{id}', [InvestigationTraceController::class, 'destroypdf'])->name('investigationtrace.destroypdf');
    Route::get('/portal/laboratory/investigation/download-image/{id}', [InvestigationTraceController::class, 'downimage'])->name('investigationtrace.downimage');
    Route::get('/portal/laboratory/investigation/download-pdf/{id}', [InvestigationTraceController::class, 'downpdf'])->name('investigationtrace.downpdf');
    //rutas de reportes de seguimiento de investigacion
    Route::get('/portal/reports/dynamic/laboratory/investigationtrace', [InvestigationTraceController::class, 'report'])->name('investigationtrace.report');
    Route::post('/portal/query-investigationtrace', [InvestigationTraceController::class, 'query'])->name('investigationtrace.query');

    //rutas de laboratorio
    Route::get('/portal/laboratory/photos/add-laboratory', [LaboratoryPhotoController::class, 'create'])->name('photolab.create');
    Route::post('/portal/add-laboratory', [LaboratoryPhotoController::class, 'store'])->name('photolab.store');
    Route::get('/portal/laboratory/photos/show-laboratory', [LaboratoryPhotoController::class, 'show'])->name('photolab.show');
    Route::get('/portal/laboratory/photos/editar/{id}/laboratory', [LaboratoryPhotoController::class, 'edit'])->name('photolab.edit');
    Route::put('/portal/updlaboratory/{id}', [LaboratoryPhotoController::class, 'update'])->name('photolab.update');
    Route::delete('/portal/dellaboratory/{id}', [LaboratoryPhotoController::class, 'destroy'])->name('photolab.destroy');
    Route::get('/portal/laboratory/pdf-laboratory', [LaboratoryPhotoController::class, 'allpdf'])->name('photolab.pdf');
    Route::get('/portal/laboratory/excel-laboratory', [LaboratoryPhotoController::class, 'allexcel'])->name('photolab.excel');
    Route::get('/portal/laboratory/files/{id}/photos', [LaboratoryPhotoController::class, 'addfiles'])->name('photolab.files');
    Route::post('/portal/add-laboratory-photo/{id}', [LaboratoryPhotoController::class, 'storefiles'])->name('photolab.storefiles');
    Route::get('/portal/laboratory/show-laboratory-images/{id}', [LaboratoryPhotoController::class, 'showimages'])->name('photolab.showimages');
    Route::get('/portal/laboratory/download-image/{id}', [LaboratoryPhotoController::class, 'downimage'])->name('photolab.downimage');
    Route::delete('/portal/dellaboratory-image/{id}', [LaboratoryPhotoController::class, 'destroyimage'])->name('photolab.destroyimage');
    //rutas de reportes de laboratorio
    Route::get('/portal/reports/dynamic/laboratory/laboratories', [LaboratoryPhotoController::class, 'report'])->name('photolab.report');
    Route::post('/portal/query-laboratories', [LaboratoryPhotoController::class, 'query'])->name('photolab.query');

    //rutas de visitas tecnicas
    Route::get('/portal/technical-visits/add-visit', [VisitController::class, 'create'])->name('visit.create');
    Route::post('/portal/add-visit', [VisitController::class, 'store'])->name('visit.store');
    Route::get('/portal/technical-visits/show-visits', [VisitController::class, 'show'])->name('visit.show');
    Route::get('/portal/technical-visits/editar/{id}/visit', [VisitController::class, 'edit'])->name('visit.edit');
    Route::put('/portal/updvisit/{id}', [VisitController::class, 'update'])->name('visit.update');
    Route::delete('/portal/delvisit/{id}', [VisitController::class, 'destroy'])->name('visit.destroy');
    Route::get('/portal/technical-visits/auxiliar', [VisitController::class, 'auxiliar'])->name('visit.auxiliar');
    Route::get('/portal/technical-visits/files/{id}/visit', [VisitController::class, 'addfiles'])->name('visit.files');
    Route::post('/portal/add-visit/{id}', [VisitController::class, 'storefiles'])->name('visit.storefiles');
    Route::get('/portal/technical-visits/show-visit-images/{id}', [VisitController::class, 'showimages'])->name('visit.showimages');
    Route::get('/portal/technical-visits/show-visit-pdfs/{id}', [VisitController::class, 'showpdfs'])->name('visit.showpdfs');
    Route::delete('/portal/delvisit-image/{id}', [VisitController::class, 'destroyimage'])->name('visit.destroyimage');
    Route::delete('/portal/delvisit-pdf/{id}', [VisitController::class, 'destroypdf'])->name('visit.destroypdf');
    Route::get('/portal/technical-visits/download-image/{id}', [VisitController::class, 'downimage'])->name('visit.downimage');
    Route::get('/portal/technical-visits/download-pdf/{id}', [VisitController::class, 'downpdf'])->name('visit.downpdf');
    Route::get('/portal/technical-visits/pdf-visit', [VisitController::class, 'allpdf'])->name('visit.pdf');
    Route::get('/portal/technical-visits/excel-visit', [VisitController::class, 'allexcel'])->name('visit.excel');
    //rutas de reportes de visita tecnica
    Route::get('/portal/reports/dynamic/technical-visits', [VisitController::class, 'report'])->name('visit.report');
    Route::post('/portal/query-technical-visits', [VisitController::class, 'query'])->name('visit.query');

    //rutas de areas
    Route::get('/portal/documents/areas/add-area', [AreaController::class, 'create'])->name('area.create');
    Route::post('/portal/add-area', [AreaController::class, 'store'])->name('area.store');
    Route::get('/portal/documents/areas/show-areas', [AreaController::class, 'show'])->name('area.show');
    Route::get('/portal/documents/areas/editar/{id}/area', [AreaController::class, 'edit'])->name('area.edit');
    Route::put('/portal/updarea/{id}', [AreaController::class, 'update'])->name('area.update');
    Route::delete('/portal/delarea/{id}', [AreaController::class, 'destroy'])->name('area.destroy');
    Route::get('/portal/areas/pdf-areas', [AreaController::class, 'allpdf'])->name('area.pdf');
    Route::get('/portal/areas/excel-areas', [AreaController::class, 'allexcel'])->name('area.excel');

    //rutas de modelo de cartas
    Route::get('/portal/documents/letters/add-letter', [LetterController::class, 'create'])->name('letter.create');
    Route::post('/portal/add-letter', [LetterController::class, 'store'])->name('letter.store');
    Route::get('/portal/documents/letters/show-letters', [LetterController::class, 'show'])->name('letter.show');
    Route::get('/portal/documents/letters/editar/{id}/letter', [LetterController::class, 'edit'])->name('letter.edit');
    Route::put('/portal/updletter/{id}', [LetterController::class, 'update'])->name('letter.update');
    Route::delete('/portal/delletter/{id}', [LetterController::class, 'destroy'])->name('letter.destroy');
    Route::get('/portal/letters/pdf-letters', [LetterController::class, 'allpdf'])->name('letter.pdf');
    Route::get('/portal/letters/excel-letters', [LetterController::class, 'allexcel'])->name('letter.excel');
    //rutas de reportes de cartas
    Route::get('/portal/reports/dynamic/documents/letters', [LetterController::class, 'report'])->name('letter.report');
    Route::post('/portal/query-letters', [LetterController::class, 'query'])->name('letter.query');

    //rutas de procedimientos
    Route::get('/portal/documents/procedures/add-procedure', [ProcedureController::class, 'create'])->name('procedure.create');
    Route::post('/portal/add-procedure', [ProcedureController::class, 'store'])->name('procedure.store');
    Route::get('/portal/documents/procedures/show-procedures', [ProcedureController::class, 'show'])->name('procedure.show');
    Route::get('/portal/documents/procedures/editar/{id}/procedure', [ProcedureController::class, 'edit'])->name('procedure.edit');
    Route::put('/portal/updprocedure/{id}', [ProcedureController::class, 'update'])->name('procedure.update');
    Route::delete('/portal/delprocedure/{id}', [ProcedureController::class, 'destroy'])->name('procedure.destroy');
    Route::get('/portal/procedures/pdf-procedures', [ProcedureController::class, 'allpdf'])->name('procedure.pdf');
    Route::get('/portal/procedures/excel-procedures', [ProcedureController::class, 'allexcel'])->name('procedure.excel');
    //rutas de reportes de procedimientos
    Route::get('/portal/reports/dynamic/documents/procedures', [ProcedureController::class, 'report'])->name('procedure.report');
    Route::post('/portal/query-procedures', [ProcedureController::class, 'query'])->name('procedure.query');

    //rutas de instructivos
    Route::get('/portal/documents/instructions/add-instruction', [InstructionController::class, 'create'])->name('instruction.create');
    Route::post('/portal/add-instruction', [InstructionController::class, 'store'])->name('instruction.store');
    Route::get('/portal/documents/instructions/show-instructions', [InstructionController::class, 'show'])->name('instruction.show');
    Route::get('/portal/documents/instructions/editar/{id}/instruction', [InstructionController::class, 'edit'])->name('instruction.edit');
    Route::put('/portal/updinstruction/{id}', [InstructionController::class, 'update'])->name('instruction.update');
    Route::delete('/portal/delinstruction/{id}', [InstructionController::class, 'destroy'])->name('instruction.destroy');
    Route::get('/portal/instructions/pdf-instructions', [InstructionController::class, 'allpdf'])->name('instruction.pdf');
    Route::get('/portal/instructions/excel-instructions', [InstructionController::class, 'allexcel'])->name('instruction.excel');
    //rutas de reportes de instructivos
    Route::get('/portal/reports/dynamic/documents/instruction', [InstructionController::class, 'report'])->name('instruction.report');
    Route::post('/portal/query-instruction', [InstructionController::class, 'query'])->name('instruction.query');

    //rutas de programas analiticos
    Route::get('/portal/documents/analytic-programs/add-analytic-program', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/portal/add-analytic-program', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/portal/documents/analytic-programs/show-analytic-programs', [ProgramController::class, 'show'])->name('program.show');
    Route::get('/portal/documents/analytic-programs/editar/{id}/analytic-program', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/portal/updprogram/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/portal/delprogram/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
    Route::get('/portal/analytic-programs/pdf-analytic-programs', [ProgramController::class, 'allpdf'])->name('program.pdf');
    Route::get('/portal/analytic-programs/excel-analytic-programs', [ProgramController::class, 'allexcel'])->name('program.excel');
    //rutas de reportes de programasn analiticos
    Route::get('/portal/reports/dynamic/documents/analytic-programs', [ProgramController::class, 'report'])->name('program.report');
    Route::post('/portal/query-analytic-programs', [ProgramController::class, 'query'])->name('program.query');

    //rutas de convenios nacionales
    Route::get('/portal/agreement/national/add-agreement-national', [NationalController::class, 'create'])->name('national.create');
    Route::post('/portal/add-agreement-national', [NationalController::class, 'store'])->name('national.store');
    Route::get('/portal/agreement/national/show-agreement-national', [NationalController::class, 'show'])->name('national.show');
    Route::get('/portal/agreement/national/editar/{id}/agreement-national', [NationalController::class, 'edit'])->name('national.edit');
    Route::put('/portal/updnational/{id}', [NationalController::class, 'update'])->name('national.update');
    Route::delete('/portal/delnational/{id}', [NationalController::class, 'destroy'])->name('national.destroy');
    Route::get('/portal/national/pdf-agreement-national', [NationalController::class, 'allpdf'])->name('national.pdf');
    Route::get('/portal/national/excel-agreement-national', [NationalController::class, 'allexcel'])->name('national.excel');
    //rutas de reportes de convenios nacionales
    Route::get('/portal/reports/dynamic/agreements/national', [NationalController::class, 'report'])->name('national.report');
    Route::post('/portal/query-agreement-national', [NationalController::class, 'query'])->name('national.query');

    //rutas de convenios internacionales
    Route::get('/portal/agreement/international/add-agreement-international', [InternationalController::class, 'create'])->name('inter.create');
    Route::post('/portal/add-agreement-international', [InternationalController::class, 'store'])->name('inter.store');
    Route::get('/portal/agreement/international/show-agreement-international', [InternationalController::class, 'show'])->name('inter.show');
    Route::get('/portal/agreement/international/editar/{id}/agreement-international', [InternationalController::class, 'edit'])->name('inter.edit');
    Route::put('/portal/updinternational/{id}', [InternationalController::class, 'update'])->name('inter.update');
    Route::delete('/portal/delinternational/{id}', [InternationalController::class, 'destroy'])->name('inter.destroy');
    Route::get('/portal/international/pdf-agreement-international', [InternationalController::class, 'allpdf'])->name('inter.pdf');
    Route::get('/portal/international/excel-agreement-international', [InternationalController::class, 'allexcel'])->name('inter.excel');
    //rutas de reportes de convenios internacionales
    Route::get('/portal/reports/dynamic/agreements/international', [InternationalController::class, 'report'])->name('inter.report');
    Route::post('/portal/query-agreement-international', [InternationalController::class, 'query'])->name('inter.query');

    //rutas de Cursos / talleres
    Route::get('/portal/training/add-training', [TrainingController::class, 'create'])->name('tra.create');
    Route::post('/portal/add-training', [TrainingController::class, 'store'])->name('tra.store');
    Route::get('/portal/training/show-training', [TrainingController::class, 'show'])->name('tra.show');
    Route::get('/portal/training/editar/{id}/training', [TrainingController::class, 'edit'])->name('tra.edit');
    Route::put('/portal/updtraining/{id}', [TrainingController::class, 'update'])->name('tra.update');
    Route::delete('/portal/deltraining/{id}', [TrainingController::class, 'destroy'])->name('tra.destroy');
    Route::get('/portal/training/pdf-training', [TrainingController::class, 'allpdf'])->name('tra.pdf');
    Route::get('/portal/training/excel-training', [TrainingController::class, 'allexcel'])->name('tra.excel');
    Route::get('/portal/training/files/{id}/training', [TrainingController::class, 'addfiles'])->name('tra.files');
    Route::post('/portal/add-training/{id}', [TrainingController::class, 'storefiles'])->name('tra.storefiles');
    Route::get('/portal/training/show-training-pdfs/{id}', [TrainingController::class, 'showpdfs'])->name('tra.showpdfs');
    Route::get('/portal/training/show-training-images/{id}', [TrainingController::class, 'showimages'])->name('tra.showimages');
    Route::delete('/portal/deltraining-pdf/{id}', [TrainingController::class, 'destroypdf'])->name('tra.destroypdf');
    Route::delete('/portal/deltraining-image/{id}', [TrainingController::class, 'destroyimage'])->name('tra.destroyimage');
    Route::get('/portal/training/download-pdf/{id}', [TrainingController::class, 'downpdf'])->name('tra.downpdf');
    Route::get('/portal/training/download-image/{id}', [TrainingController::class, 'downimage'])->name('tra.downimage');
    //rutas de reportes de cursos/tallers
    Route::get('/portal/reports/dynamic/training', [TrainingController::class, 'report'])->name('tra.report');
    Route::post('/portal/query-training', [TrainingController::class, 'query'])->name('tra.query');

    //rutas de seguimiento academico
    Route::get('/portal/tracking/academic/add-academic', [AcademicController::class, 'create'])->name('acad.create');
    Route::post('/portal/tracking-academic', [AcademicController::class, 'store'])->name('acad.store');
    Route::get('/portal/tracking/academic/show-academic', [AcademicController::class, 'show'])->name('acad.show');
    Route::get('/portal/tracking/academic/editar/{id}/academic', [AcademicController::class, 'edit'])->name('acad.edit');
    Route::put('/portal/updacademic/{id}', [AcademicController::class, 'update'])->name('acad.update');
    Route::delete('/portal/delacademic/{id}', [AcademicController::class, 'destroy'])->name('acad.destroy');
    Route::get('/portal/tracking/academic/pdf-academic', [AcademicController::class, 'allpdf'])->name('acad.pdf');
    Route::get('/portal/tracking/academic/excel-academic', [AcademicController::class, 'allexcel'])->name('acad.excel');
    Route::get('/portal/tracking/academic/auxiliar', [AcademicController::class, 'auxiliar'])->name('acad.auxiliar');
    //rutas de reportes de seguimiento academico
    Route::get('/portal/reports/dynamic/tracking/academic', [AcademicController::class, 'report'])->name('acad.report');
    Route::post('/portal/query-tracking-academic', [AcademicController::class, 'query'])->name('acad.query');

    //rutas de seguimiento laboral
    Route::get('/portal/tracking/work/add-work', [WorkController::class, 'create'])->name('work.create');
    Route::post('/portal/tracking-work', [WorkController::class, 'store'])->name('work.store');
    Route::get('/portal/tracking/work/show-work', [WorkController::class, 'show'])->name('work.show');
    Route::get('/portal/tracking/work/editar/{id}/work', [WorkController::class, 'edit'])->name('work.edit');
    Route::put('/portal/updwork/{id}', [WorkController::class, 'update'])->name('work.update');
    Route::delete('/portal/delwork/{id}', [WorkController::class, 'destroy'])->name('work.destroy');
    Route::get('/portal/tracking/work/pdf-work', [WorkController::class, 'allpdf'])->name('work.pdf');
    Route::get('/portal/tracking/work/excel-work', [WorkController::class, 'allexcel'])->name('work.excel');
    Route::get('/portal/tracking/work/auxiliar', [WorkController::class, 'auxiliar'])->name('work.auxiliar');
    //rutas de reportes de seguimiento laboral
    Route::get('/portal/reports/dynamic/traking/work', [WorkController::class, 'report'])->name('work.report');
    Route::post('/portal/query-traking-work', [WorkController::class, 'query'])->name('work.query');

    //rutas de seguimiento cultural
    Route::get('/portal/tracking/culture/add-culture', [CultureController::class, 'create'])->name('cult.create');
    Route::post('/portal/tracking-culture', [CultureController::class, 'store'])->name('cult.store');
    Route::get('/portal/tracking/culture/show-culture', [CultureController::class, 'show'])->name('cult.show');
    Route::get('/portal/tracking/culture/editar/{id}/culture', [CultureController::class, 'edit'])->name('cult.edit');
    Route::put('/portal/updculture/{id}', [CultureController::class, 'update'])->name('cult.update');
    Route::delete('/portal/delculture/{id}', [CultureController::class, 'destroy'])->name('cult.destroy');
    Route::get('/portal/tracking/culture/pdf-culture', [CultureController::class, 'allpdf'])->name('cult.pdf');
    Route::get('/portal/tracking/culture/excel-culture', [CultureController::class, 'allexcel'])->name('cult.excel');
    //rutas de reportes de seguimiento cultural
    Route::get('/portal/reports/dynamic/traking/culture', [CultureController::class, 'report'])->name('cult.report');
    Route::post('/portal/query-traking-culture', [CultureController::class, 'query'])->name('cult.query');

    //Rutas de lista de estudiantes
    Route::get('/portal/training/assistance/add-list-assistance', [AssistanceController::class, 'create'])->name('assist.create');
    Route::post('/portal/training-assistance', [AssistanceController::class, 'store'])->name('assist.store');
    Route::get('/portal/training/assistance/show-list-assistance', [AssistanceController::class, 'show'])->name('assist.show');
    Route::get('/portal/training/assistance/show-list-assistance/{id}/training', [AssistanceController::class, 'showlist'])->name('assist.showlist');
    Route::delete('/portal/delassistance/{id}', [AssistanceController::class, 'destroy'])->name('assist.destroy');
    Route::get('/portal/training/assistance/pdf-list-assistance/{id}', [AssistanceController::class, 'allpdf'])->name('assist.pdf');
    Route::get('/portal/training/assistance/excel-list-assistance/{id}', [AssistanceController::class, 'allexcel'])->name('assist.excel');

    //Rutas de plantillas de certificados
    Route::get('/portal/training/template/add-template', [TemplateController::class, 'create'])->name('temp.create');
    Route::post('/portal/training-template', [TemplateController::class, 'store'])->name('temp.store');
    Route::get('/portal/training/template/editar/{id}/template', [TemplateController::class, 'edit'])->name('temp.edit');
    Route::put('/portal/updtemplate/{id}', [TemplateController::class, 'update'])->name('temp.update');
    Route::get('/portal/training/template/show-template', [TemplateController::class, 'show'])->name('temp.show');
    Route::delete('/portal/deltemplate/{id}', [TemplateController::class, 'destroy'])->name('temp.destroy');
    Route::get('/portal/training/template/auxiliar', [TemplateController::class, 'auxiliar'])->name('temp.auxiliar');

    //Rutas de certificados digitales
    Route::get('/portal/training/certificate/{id}/certificates', [CertificateController::class, 'create'])->name('certif.create');
    Route::post('/portal/training/{training_id}/student/{student_id}', [CertificateController::class, 'store'])->name('certif.store');
    Route::get('/portal/training/certificate/pdf-certificates/{training_id}', [CertificateController::class, 'allpdf'])->name('certif.pdf');
    Route::delete('/portal/delcertificate/training/{training_id}/student/{student_id}', [CertificateController::class, 'destroy'])->name('certif.destroy');

});