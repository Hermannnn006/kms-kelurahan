<?php

namespace App\Http\Controllers;

use App\Models\Joblist;
use Illuminate\Http\Request;

class JoblistController extends Controller
{
    public function index()
    {
        $joblists = Joblist::all();
        return view('joblist.index', compact('joblists'));
    }   
}