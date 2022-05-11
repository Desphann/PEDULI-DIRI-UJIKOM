<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function halamanRegister(){
        return view('pages.register');
    }

    public function simpanUser(Request $request){
        $validator = Validator::make($request->all(),[
            'NIK' =>'required|unique:users,email|min:7|max:7',
            'nama' =>'required'
        ]);
        if($validator->fails()){
            return redirect('/register')->with('error', 'Registrasi Gagal');
        }
        $data=[
            'name'=>$request->nama,
            'email'=>$request->NIK,
            'password'=>bcrypt($request->NIK),
        ];
        User::create($data);
        return redirect('/')->with('succes', 'Akun berhasil dibuat');
    }
}
