<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=DB::table('photos')->get();
        return view('backend.Gallery.photo',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['title']=$request->title;
        $data['type']=$request->type;
     
        
        
        
//  DD($data);
         $image=$request->photo;
        if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension(); //imagename
      $M=Image::make($image)->resize(500, 300) ->save(public_path('postimages/').$image_one);;
    
     
          $data['photo']='postimages/'.$image_one;
            DB::table('photos')->insert($data);
           $notification=array(
            'messege'=>'post Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);

    
   
        }else{
            return Redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image= DB::table('photos')->where('id',$id)->first();
       
        
        //dd($post);
       
        return view('backend.post.edit',compact('posts','categories','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= DB::table('photos')->where('id',$id)->first();
        unlink($post->photo);
        DB::table('photos')->where('id',$id)->delete();
        $notification=array(
         'messege'=>'post Successfully delete',
         'alert-type'=>'success'
               );
    return Redirect()->back()->with($notification);
    }
}
