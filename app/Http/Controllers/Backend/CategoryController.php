<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class CategoryController extends Controller

{
   

    public function index()
    { 
        $categories = DB::table('categories')->get();
        return view('backend.category.index',compact('categories'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_en' => 'required|unique:categories|max:255',
            'category_bn' => 'required|unique:categories|max:255',
        ]);
        $data = array();
        $data['category_en']=$request->category_en;
        $data['category_bn']=$request->category_bn;
        DB::table('categories')->insert($data);
        $notification=array(
            'messege'=>'Category Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
    }
    public function destroy($id)
    { 
       DB::table('categories')->where('id',$id)->delete();
       $notification=array(
        'messege'=>'Category Successfully delete',
        'alert-type'=>'success'
              );
   return Redirect()->back()->with($notification);
    }

    public function update($id)
    { 
      $category= DB::table('categories')->where('id',$id)->first();
      return view('backend.category.edit',compact('category'));
    }
    public function up(Request $request,$id)
    {
        $validated = $request->validate([
            'category_en' => 'required|max:255',
            'category_bn' => 'required|max:255',
        ]);
        $data = array();
        $data['category_en']=$request->category_en;
        $data['category_bn']=$request->category_bn;
        DB::table('categories')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Category Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->route('categories')->with($notification);
    }

}
