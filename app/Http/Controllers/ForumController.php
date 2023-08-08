<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Komentar;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        return view('forum.index',[
            'pertanyaans' => Forum::with(['forum_user', 'komentars'])->get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'pertanyaan' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        $validator['user_id'] = auth()->user()->id;
        Forum::create($validator);
        return redirect('/forum')->with('success', 'pertanyaan berhasil dikirim');
    }

    public function show(string $id)
    {
        return view('forum/show',[
            'pertanyaan' => Forum::with('forum_user')->findOrFail($id),
            'komentar' => Komentar::with('komentar_user')->where('forum_id', $id)->get()
        ]);
    }

    public function kirimPesan(Request $request)
    {
        $validator = $request->validate([
            'komentar' => 'required',
            'forum_id' => 'required'
        ]);
        $validator['user_id'] = auth()->user()->id;
        Komentar::create($validator);
        return back();
    }

    public function incrementForumView(Request $request)
    {
        $id = $request->input('pertanyaan_id');
        Forum::where('id', $id)->increment('view');
        return redirect('/forum/' . $id);
    }
}
