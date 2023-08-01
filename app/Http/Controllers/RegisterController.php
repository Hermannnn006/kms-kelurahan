<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
           $validator = $request->validate([
               'name' => 'required|max:50',
               'nip' => 'required|unique:users|integer',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:5|max:255'
           ]);
   
           $validator['password'] = bcrypt($validator['password']);
           $validator['level'] = 'user';
           $validator['foto'] = 'img/profil.jpg';
   
           User::create($validator);
           return redirect('/login')->with('success','Pendaftaran berhasil, Silahkan login!');
    }
}
