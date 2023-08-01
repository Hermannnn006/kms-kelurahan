<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index',[
            'user' => User::findOrFail(auth()->user()->id)
        ]);
    }

    public function edit(String $id)
    {
        return view('profil.edit',[
            'user' => User::findOrFail($id)
        ]);
    }
}
