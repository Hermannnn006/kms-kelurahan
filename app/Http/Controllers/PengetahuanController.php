<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengetahuanController extends Controller
{
    public function index(){
        return view('pengetahuan.index',[
            'pengetahuans' => Pengetahuan::with('pengetahuan_user')->latest()->get()
        ]);
    }

    public function show(String $id)
    {
        $pengetahuan = Pengetahuan::find($id);
        $mime = Storage::mimeType($pengetahuan->file);
        return view('pengetahuan.show', compact('pengetahuan', 'mime'));
    }
}
