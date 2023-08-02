<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return view('pegawai.index',[
            'pegawais' => User::where('level', '!=', 'admin')->orderBy('name')->get()
        ]);
    }
}
