<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    //
    public function index()
    { 
        $subcategories = DB::table('subcategories')->join('categories','subcategories.category_id','categories.id')->select('categories.category_bn','categories.category_en','subcategories.*')->get();
        $categories= DB::table('categories')->get();

        return view('backend.subcategory.index',compact('subcategories','categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_bn' => 'required|unique:subcategories|max:255',
            'category_id' => 'required'
        ]);
        $data = array();
        $data['subcategory_en']=$request->subcategory_en;
        $data['subcategory_bn']=$request->subcategory_bn;
        $data['category_id']=$request->category_id;
        DB::table('subcategories')->insert($data);
        $notification=array(
            'messege'=>'subCategory Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
    }

    public function destroy($id)
    { 
       DB::table('subcategories')->where('id',$id)->delete();
       $notification=array(
        'messege'=>'subCategory Successfully delete',
        'alert-type'=>'success'
              );
   return Redirect()->back()->with($notification);
// echo $id;

    }
    public function update($id)
    { 
      $subcategory= DB::table('subcategories')->where('id',$id)->first();
      $categories= DB::table('categories')->get();
      return view('backend.subcategory.edit',compact('subcategory','categories'));
    }

    public function up(Request $request,$id)
    {
        $validated = $request->validate([
            'subcategory_en' => 'required|max:255',
            'subcategory_bn' => 'required|max:255',
            'category_id' => 'required'
        ]);
        $data = array();
        $data['subcategory_en']=$request->subcategory_en;
        $data['subcategory_bn']=$request->subcategory_bn;
        $data['category_id']=$request->category_id;
        DB::table('subcategories')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'subCategory Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->route('subcategories')->with($notification);


     }
}
