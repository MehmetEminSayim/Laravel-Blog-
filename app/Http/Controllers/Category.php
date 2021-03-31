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

    public function delete($id){
        $delete = CategoryModel::where('id',$id)->delete();
        if ($delete){
            return back()->with('status', 'Silme işlemi başarılı');
        }else
            return back()->with('status', 'Hata! silme işlemi başarısız');
    }

    public function updateform($id){
        $m = CategoryModel::where('id',$id)->get();
        $data =$m->first();
        return view('category/updateform',compact('data'));
    }


    public function update(Request $request , $id){

        $cat = new CategoryModel();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);

        $update =  $cat->update('id',$id);
        if ($update){
            return back()->with('status','Kategori başarılı bir şekilde kaydedildi');
        }
    }

}
