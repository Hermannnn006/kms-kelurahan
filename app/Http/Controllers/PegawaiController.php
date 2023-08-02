<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.index',[
            'pegawais' => User::where('level', '!=', 'admin')->orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pegawai.edit',[
                'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => 'required|max:50',
            'nip' => 'required|integer',
            'email' => 'required|email',
            'foto' => 'image|mimes:jpg,png,jpeg|max:1024',
        ];

        $validator = $request->validate($rules);
        if($request->file('foto')) {
            $validator['foto'] = $request->file('foto')->store('img');
        }

        User::where('id', $user->id)->update($validator);
        return redirect('/pegawai')->with('success','Data user berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        User::destroy($user->id);
        return redirect('/pegawai')->with('danger', 'Data user berhasil dihapus');
    }
}
