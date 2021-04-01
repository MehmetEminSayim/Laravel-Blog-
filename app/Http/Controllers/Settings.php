<?php

namespace App\Http\Controllers;

use App\Models\BlogModel;
use App\Models\SettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Settings extends Controller
{
    public function index(){
        $data = SettingsModel::where('type','smtp')->get();
        return view('settings/content',compact('data'));
    }

    public function updatesettings(Request $request)
    {

        $data = $request->all();
        $veriable = Arr::except($data,['_token']);
        foreach ($veriable as $type) {
            foreach ($type as $key => $veri) {
                DB::table('settings')->where('type','smtp')->where('name',$key)->update([
               'value' =>$veri,
               ]);
            }
        }
        return back()->with('status','Ayarlar güncellendi');
    }
}
