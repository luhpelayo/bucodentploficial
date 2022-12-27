<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        if (auth()->attempt(request(['username','password'])) ==false ) {
            return back()->withErrors([
                'message' => 'Datos Incorrectos, Intente de Nuevo!',
            ]);
        }
        alert()->success('Sessión Exitosa','Bienvenido al Portal')->autoclose(2000);
        return redirect()->to('portal');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }

}
