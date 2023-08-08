<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pekerjaan.index', [
            'pekerjaans' => Pekerjaan::all()
        ]);
    }

    public function create(){
        return view('pekerjaan.create');
    }

    public function update(Request $request, string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->update([
            'status' => $request->status
        ]);
        return redirect('/pekerjaan')->with('success', 'Status berhasil diubah');
    }

    public function destroy(string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        Pekerjaan::destroy($pekerjaan->id);
        return redirect('/pekerjaan')->with('danger', 'Data berhasil dihapus');
    }

    public function store(Request $request)
    {
           $validator = $request->validate([
               'pekerjaan' => 'required|max:50',
           ]);
           Pekerjaan::create($validator);
           return redirect('/pekerjaan')->with('success','Data berhasil disimpan');
    }
}
