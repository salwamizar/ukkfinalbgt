<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PklController extends Controller
{
    public function index() {
        $pkls = DB::table('pkls');

        return view('pkl.index', compact('pkls'));
    }
}
