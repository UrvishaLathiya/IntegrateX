<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() { return view('home'); }
    public function about() { return view('about'); }
    public function resume() { return view('resume'); }
    public function github() { return view('github'); }
    public function blog() { return view('blog'); }
    public function contact() { return view('contact'); }
    public function projects() { return view('projects'); }
    public function myprofile() { return view('myprofile'); }
    public function certificate() { return view('certificate'); }

}
