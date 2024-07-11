<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('home');
    }
    
    function displayAbout() {
        $name = "Chrwyn";
        $date = date('d M Y');
        return view('about', compact('name', 'date'));
    }

    function displayBlog() {
        $contents = [
            ['title' => 'Judul Post 1', 'content' => 'Content Post 1', 'status' => true],
            ['title' => 'Judul Post 2', 'content' => 'Content Post 2', 'status' => false],
            ['title' => 'Judul Post 3', 'content' => 'Content Post 3', 'status' => true],
            ['title' => 'Judul Post 4', 'content' => 'Content Post 4', 'status' => false],
        ];
        return view('blog', compact('contents'));
    }

    function displayContact() {
        return view('contact');
    }


}
