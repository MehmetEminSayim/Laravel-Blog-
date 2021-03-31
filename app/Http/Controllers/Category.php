<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Category extends Controller
{
    public function __construct () {
        $this->middleware('auth');
        Carbon::now('Europe/Istanbul');
        Carbon::setLocale('tr');
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
        $data = CategoryModel::where('id',$id)->get()->first();
        return view('category/updateform',compact('data'));
    }


    public function update(Request $request , $id){

        $update = CategoryModel::where('id',$id)->update([
               'name' =>$request->name,
               'slug' =>Str::slug($request->name)
               ]);
        if ($update){
            return back()->with('status','Kategori başarılı bir şekilde güncellendi');
        }
    }

}
