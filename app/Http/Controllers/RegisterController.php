<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    
    public function store(){
        $this->validate(request(),[
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'rol' => 'required',
        ]);
        $user = User::create(request(['name','lastname','username','email','password','rol']))->assignRole(request(['rol']));
        auth()->login($user);
        alert()->success('Usuario Registrado','Por Favor Inicie Sesion')->autoclose(2000);
        return redirect()->to('login');
    }

    public function edit(){
        $id = auth()->user()->id;
        $usuario = User::find($id);
        return view('auth.useredit', compact('usuario'));
    }

    public function editpassword(){
        $id = auth()->user()->id;
        $usuario = User::find($id);
        return view('auth.password', compact('usuario'));
    }

    public function updatepassword(Request $request){
        $validated = $request->validate([
            'password' => 'required|confirmed',
        ]);
        $id = auth()->user()->id;
        $usuario = User::find($id);
        $usuario->password = $request->password;
        $usuario->save();
        return redirect()->route('login.destroy');
    }

    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'img' => 'image',
        ]);
        $id = auth()->user()->id;
        $usuario = User::find($id);
        if ($request->hasFile('img')) {
            if ($usuario->image != null) {
                Storage::disk('images')->delete($usuario->image);
                $usuario->image = null;
            }
            $usuario->image = $request->file('img')->store('users','images');

        }
        $usuario->name = $request->name;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->save();
        alert()->success('Perfil Actualizado','Gracias')->autoclose(2000);
        return redirect()->route('portal.index');
    }

}
