<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class districtController extends Controller
{
    
    public function index()
    { 
        $districts = DB::table('districts')->get();
        return view('backend.district.index',compact('districts'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_bn' => 'required|unique:districts|max:255',
        ]);
        $data = array();
        $data['district_en']=$request->district_en;
        $data['district_bn']=$request->district_bn;
        DB::table('districts')->insert($data);
        $notification=array(
            'messege'=>'district Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
   
    }
    public function destroy($id)
    { 
       DB::table('districts')->where('id',$id)->delete();
       $notification=array(
        'messege'=>'districts Successfully delete',
        'alert-type'=>'success'
              );
   return Redirect()->back()->with($notification);

    }

    public function update($id)
    { 
      $district= DB::table('districts')->where('id',$id)->first();
      return view('backend.district.edit',compact('district'));
   
    }
    public function up(Request $request,$id)
    {
        $validated = $request->validate([
            'district_en' => 'required|unique:districts|max:255',
            'district_bn' => 'required|unique:districts|max:255',
        ]);
        $data = array();
        $data['district_en']=$request->district_en;
        $data['district_bn']=$request->district_bn;
        DB::table('districts')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'district Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->route('districts')->with($notification);
  
    }

}
