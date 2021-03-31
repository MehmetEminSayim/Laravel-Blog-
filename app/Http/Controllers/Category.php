<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Category extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function index(){
        $data = CategoryModel::all();
        return view('category/content',compact('data'));
    }

    public function addform(){
        return view('category/addform');
    }

    public function savedata(Request $request){
        $cat = new CategoryModel();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);

        $insert =  $cat->save();
        if ($insert){
            return back()->with('status','Kategori başarılı bir şekilde kaydedildi');
        }
    }
}
