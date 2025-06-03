<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndustriController extends Controller
{
    public function index() {
        $industri = DB::table('industris');

        return view('industri.index', compact('industris'));
    }
}
