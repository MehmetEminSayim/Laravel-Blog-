<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function PHPUnit\Framework\fileExists;


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

    public function addform(){
        return view('blog/addform');
    }

    public function savedata (Request $request){

        if ($request->hasFile('image')) {
            //  Let's do everything here
            $imgname =$request->image->getClientOriginalName();
            $random=  Str::random(16);
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'title' => 'string',
                    'content' => 'string',
                    'image' => 'mimes:jpeg,png,jpg',
                ]);
                //$extension = $request->image->extension();
                $request->image->storeAs('/public/uploads',$random.$imgname);
                $url = $random.$imgname;

                $data = new BlogModel();
                $data->title = $request->title;
                $data->content = $request->text;
                $data->img_url = $url;
                $data->slug = Str::slug($request->title);

                $insert = $data->save();

                if ($insert){
                    return back()->with('status','Blog başarılı bir şekilde eklendi');
                }else
                    return back()->with('status','Blog eklenemedi');

            }
        }
    }

    public function delete ($id){
        $post = BlogModel::where('id', $id)->first();
        $file= $post->img_url;

        $filename = public_path()."/storage/uploads/".$file;
        if(file_exists($filename)){
            unlink($filename);
            $post->delete();
        }
        else {
            $post->delete();
        }
        return back()->with('status','Silme işlemi başarılı');

    }

    public function updateform($id){
        $data = BlogModel::where('id',$id)->get()->first();
        return view('blog/updateform',compact('data'));
    }

    public function update(Request $request,$id){


        if ( $_FILES['image']['name']){
            $post = BlogModel::where('id', $id)->first();
            $file= $post->img_url;
            $filename = public_path()."/storage/uploads/".$file;
            unlink($filename);
            if ($request->hasFile('image')) {
                //  Let's do everything here
                $imgname =$request->image->getClientOriginalName();
                $random=  Str::random(16);
                if ($request->file('image')->isValid()) {
                    //
                    $validated = $request->validate([
                        'title' => 'string',
                        'content' => 'string',
                        'image' => 'mimes:jpeg,png,jpg',
                    ]);
                    //$extension = $request->image->extension();
                    $request->image->storeAs('/public/uploads',$random.$imgname);
                    $url = $random.$imgname;

                    $update = BlogModel::where('id',$id)->update([
                        'title' =>$request->title,
                        'content' =>$request->text,
                        'img_url' =>$url,
                        'slug' =>Str::slug($request->title)
                    ]);

                    if ($update){
                        return back()->with('status','Blog başarılı bir şekilde güncellendi');
                    }else
                        return back()->with('status','Blog güncellenemedi');

                }
            }
        }else {
            $update = BlogModel::where('id',$id)->update([
                'title' =>$request->title,
                'content' =>$request->text,
                'slug' =>Str::slug($request->title)
            ]);

            if ($update){
                return back()->with('status','Blog başarılı bir şekilde güncellendi');
            }else
                return back()->with('status','Blog güncellenemedi');
        }


    }

}
