<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SubdistrictController extends Controller
{
    //
    //
    public function index()
    { 
        $subdistricts = DB::table('subdistricts')->join('districts','subdistricts.district_id','districts.id')->select('districts.district_bn','districts.district_en','subdistricts.*')->get();
        $districts= DB::table('districts')->get();

        return view('backend.subdistrict.index',compact('subdistricts','districts'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_bn' => 'required|unique:subdistricts|max:255',
            'district_id' => 'required'
        ]);
        $data = array();
        $data['subdistrict_en']=$request->subdistrict_en;
        $data['subdistrict_bn']=$request->subdistrict_bn;
        $data['district_id']=$request->district_id;
        DB::table('subdistricts')->insert($data);
        $notification=array(
            'messege'=>'subdistrict Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);

//    echo $request->subdistrict_en;


//    echo $request->subdistrict_bn;

//     echo   $request->district_id;
    }

    public function destroy($id)
    { 
       DB::table('subdistricts')->where('id',$id)->delete();
       $notification=array(
        'messege'=>'subCategory Successfully delete',
        'alert-type'=>'success'
              );
   return Redirect()->back()->with($notification);


    }
    public function update($id)
    { 
      $subdistricts= DB::table('subdistricts')->where('id',$id)->first();
      $districts= DB::table('districts')->get();
      return view('backend.subdistrict.edit',compact('subdistricts','districts'));
    }

    public function up(Request $request,$id)
    {
        $validated = $request->validate([
        'subdistrict_en' => 'required|unique:subdistricts|max:255',
        'subdistrict_bn' => 'required|unique:subdistricts|max:255',
        'district_id' => 'required'
    ]);
    $data = array();
        $data['subdistrict_en']=$request->subdistrict_en;
        $data['subdistrict_bn']=$request->subdistrict_bn;
        $data['district_id']=$request->district_id;
       DB::table('subdistricts')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'subdistricts Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->route('subdistricts')->with($notification);
    // echo $request->subdistrict_en;
    // echo $request->subdistrict_bn;
    // echo $request->district_id;


     }
}
