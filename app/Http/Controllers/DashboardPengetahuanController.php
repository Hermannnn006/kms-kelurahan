<?php

namespace App\Http\Controllers;

use App\Models\Pengetahuan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class DashboardPengetahuanController extends Controller
{
    public function index(){
        return view('dashboard.pengetahuan.index',[
            'pengetahuans' => Pengetahuan::with('pengetahuan_user')->where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create(){
        return view('dashboard.pengetahuan.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'file' => 'required|mimes:jpeg,png,pdf,mp4',
        ];

        $validator = $request->validate($rules);
        $validator['user_id'] = auth()->user()->id;
        $validator['file'] = $request->file('file')->store('file-pengetahuan'); 
        Pengetahuan::create($validator);
        return redirect('/dashboard/pengetahuan');
    }

    public function show(string $id)
    {
        $pengetahuan = Pengetahuan::find($id);
        $mime = Storage::mimeType($pengetahuan->file);
        return view('dashboard.pengetahuan.show', compact('pengetahuan', 'mime'));
    }

    public function edit(string $id)
    {
        return view('dashboard.pengetahuan.edit',[
                'pengetahuan' => Pengetahuan::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $pengetahuan = Pengetahuan::find($id);
        $rules = [
            'judul' => 'required',
            'file' => 'mimes:jpeg,png,pdf,mp4',
        ];
        $validator = $request->validate($rules);
        if($request->file('file')) {
            if($request->oldFile){
                Storage::delete($request->oldFile);
            }
            $validator['file'] = $request->file('file')->store('file-pengetahuan');
        } 
        Pengetahuan::where('id', $pengetahuan->id)->update($validator);
        return redirect('/dashboard/pengetahuan')->with('success','Data berhasil diubah!');
    }

    public function destroy(string $id)
    {
        $pengetahuan = Pengetahuan::find($id);
        Pengetahuan::destroy($pengetahuan->id);
        return redirect('/dashboard/pengetahuan')->with('danger', 'Data berhasil dihapus');
    }

    public function incrementPengetahuanView(Request $request)
    {
        $id = $request->input('pengetahuan_id');
        Pengetahuan::where('id', $id)->increment('view');
        return redirect('/pengetahuan/' . $id);
    }
}