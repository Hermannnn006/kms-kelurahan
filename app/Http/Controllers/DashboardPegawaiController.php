<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardPegawaiController extends Controller
{
    public function index(){
        return view('dashboard.pegawai.index',[
            'pegawais' => User::where('level', '!=', 'admin')->orderBy('name')->get()
        ]);
    }

    public function create(){
        return view('dashboard.pegawai.create');
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
           return redirect('/dashboard/pegawai')->with('success','Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        return view('dashboard.pegawai.edit',[
                'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $rules = [
            'name' => 'required|max:50',
            'nip' => 'required|integer',
            'email' => 'required|email',
        ];

        $validator = $request->validate($rules);
        if(!$request->password){
            $validator['password'] = $user->password;
        } 
        $validator['password'] = bcrypt($request->password);
        User::where('id', $user->id)->update($validator);
        return redirect('/dashboard/pegawai')->with('success','Data user berhasil diubah!');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        User::destroy($user->id);
        return redirect('/dashboard/pegawai')->with('danger', 'Data pegawai berhasil dihapus');
    }
}
