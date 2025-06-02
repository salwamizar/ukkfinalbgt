<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index() {
        $siswas = DB::table('siswas');

        return view('siswa.index', compact('siswas'));
    }
}
