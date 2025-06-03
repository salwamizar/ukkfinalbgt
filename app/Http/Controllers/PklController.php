<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PklController extends Controller
{
    public function index() {
        $pkls = DB::table('pkls');

        return view('pkl.index', compact('pkls'));
    }

    public function create()
    {
        if(auth()->user()->role !== 'siswa') {
            abort(403, 'hanya siswa yang bisa membuat laporan pkl');
        }
    }
}
