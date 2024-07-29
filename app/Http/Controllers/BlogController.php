<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    function index()
    {
        $blogs = DB::table('blogs')->where('status', true)->get();
        return view('welcome', compact('blogs'));
    }
}
