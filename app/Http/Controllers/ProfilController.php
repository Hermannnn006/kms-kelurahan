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

    public function update(Request $request, String $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => 'required|max:50',
            'nip' => 'required|integer|unique:users,nip,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'foto' => 'image|mimes:jpg,png,jpeg|max:1024',
        ];

        $validator = $request->validate($rules);
        if($request->file('foto')) {
            $validator['foto'] = $request->file('foto')->store('img');
        }

        User::where('id', $user->id)->update($validator);
        return redirect('/profil')->with('success','Profil berhasil diubah!');
    }
}
