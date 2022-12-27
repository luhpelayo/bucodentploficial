<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use PDF;
use Carbon\Carbon;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
class CategoryController extends Controller
{
    public function create(){
        return view ('graduated.category.addCategory');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories',
            'category_description' => 'required|max:254',
        ]);
            $category = new Category;
            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;
            $category->save();
            alert()->success('Registro Exitoso','Mostrando Registros')->position('top-end')->autoclose(2000);
            return redirect()->route('category.show');
    }

    public function show(){
        $categories = Category::all();
        return view ('graduated.category.viewCategory', compact('categories'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('graduated.category.editCategory',compact('category'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'category_name' => 'required',
            'category_description' => 'required|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->save();
        alert()->success('Datos Actualizados','Mostrando Registros')->position('top-end')->autoclose(2000);
        return redirect()->route('category.show');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        alert()->success('Categoria Eliminada','Mostrando Registros')->position('top-end')->autoclose(2000);
        return back();
    }

    public function allpdf(){
        $categories = Category::all();
        $fecha = Carbon::now();
        $cantidad = Category::count();   
        $pdf = PDF::loadView('graduated.category.staticpdf', compact('categories','fecha','cantidad'));
        return $pdf->download('categories.pdf');
    }

    public function allexcel(){
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
}
