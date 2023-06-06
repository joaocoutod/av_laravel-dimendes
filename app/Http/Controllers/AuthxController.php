<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AuthxController extends Controller
{
    public function login_view(){ return view('/auth/login'); }
    public function cadastro_view(){ return view('/auth/cadastro'); }

    public function authLogin(Request $request){
        
        $user = User::where('email', $request->email)->First();
        if($user){
            if (Hash::check($request->password, $user->password))  {//valida senha
                Auth::login($user); // autentica o usuário
                return redirect('/user/'.Auth::user()->id);
            }
        }

        return back()->with('error', 'Credencias invalídas');

    }


    public function authCadastro(Request $request){
        if (!empty($request)) {
            // VERIFY NOME
            if (User::where('name', $request->name)->first()) {
                return back()->with('error', 'O nome ('.$request->name.') já existe!');
            }

            // Verificar se o email já existe
            if (User::where('email', $request->email)->first()) {
                return back()->with('error', 'O email ('.$request->email.') já está em uso!');
            }

            // VALIDA SENHA
            if ($request->password != $request->conf_password) {    
                return back()->with('error', 'Confirmação de senha não confere');
            }

            // VERIFICA SE O ID JÁ EXISTE NO BANCO
            do {
                $randomNumber = '';
                for ($i = 0; $i < 6; $i++) {
                    $randomNumber .= strval(random_int(0, 9));
                }
            } while (User::where('id', $randomNumber)->exists());

            $user = new User;
            $user->id = $randomNumber;
            $user->name = $request->name; 
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // Criptografar a senha antes de salvar

            $user->save();

            // Autenticar o usuário após o cadastro
            Auth::login($user);

            return redirect('/user/' . Auth::user()->id);
        } else {
            return back()->with('error', 'Erro ao fazer cadastro');
        }
    }


    //-------------SAIR---------------/
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
