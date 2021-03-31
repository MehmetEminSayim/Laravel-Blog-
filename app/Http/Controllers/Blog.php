<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use Illuminate\Http\Request;

class Blog extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index (){
        $data = BlogModel::all();
        return view('blog/content',compact('data'));
    }
}
