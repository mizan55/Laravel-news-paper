<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $posts=DB::table('posts')->join('categories','posts.cat_id','categories.id')->join('subcategories','posts.subcat_id','subcategories.id')->select('posts.*','categories.category_bn','categories.category_en','subcategories.subcategory_bn','subcategories.subcategory_en')->get();
   return view('backend/post/index',compact('posts'));
    // return response()->json($posts);
    //     dd($po);
    }

  
    public function create()
    {
        //
        $categories=DB::table('categories')->get();
        $districts=DB::table('districts')->get();
        return view('backend.post.create',compact('categories','districts'));
    }

   
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'cat_id' => 'required',
        //     'dist_id' => 'required',
          
        // ]);
        $data = array();
        $data['title_bn']=$request->title_bn;
        $data['title_en']=$request->title_en;
        $data['user_id']= Auth::id();
        $data['cat_id']=$request->cat_id;
        $data['subcat_id']=$request->subcat_id;
        $data['dist_id']=$request->dist_id;
        $data['subdist_id']=$request->subdist_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;
        $data['tags_bn']=$request->tags_bn;
        $data['tags_en']=$request->tags_en;
        $data['headline']=$request->headline;
        $data['first_section']=$request->firstsection;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;
        $data['bigthumbnail']=$request->bigthumbnail;
        $data['post_date']=date('d-m-Y');
        $data['post_month']=date("F");
       
        
        
//  DD($data);
         $image=$request->image;
        if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension(); //imagename
      $M=Image::make($image)->resize(300, 200) ->save(public_path('postimages/').$image_one);;
    
     
          $data['image']='postimages/'.$image_one;
            DB::table('posts')->insert($data);
           $notification=array(
            'messege'=>'post Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);

    
   
        }else{
            return Redirect()->back();
        }

    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $posts= DB::table('posts')->where('id',$id)->first();
        $categories=DB::table('categories')->get();
        $districts=DB::table('districts')->get();
        
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
        $data = array();
        $data['title_bn']=$request->title_bn;
        $data['title_en']=$request->title_en;
        $data['user_id']= Auth::id();
        $data['cat_id']=$request->cat_id;
        $data['subcat_id']=$request->subcat_id;
        $data['dist_id']=$request->dist_id;
        $data['subdist_id']=$request->subdist_id;
        $data['details_en']=$request->details_en;
        $data['details_bn']=$request->details_bn;
        $data['tags_bn']=$request->tags_bn;
        $data['tags_en']=$request->tags_en;
        $data['headline']=$request->headline;
        $data['first_section']=$request->firstsection;
        $data['first_section_thumbnail']=$request->first_section_thumbnail;
        $data['bigthumbnail']=$request->bigthumbnail;
        $data['post_date']=date('d-m-Y');
        $data['post_month']=date("F");
       
        
        
//  DD($data);
         $oldimage=$request->oldimage;
         $image=$request->image;
        if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension(); //imagename
      $M=Image::make($image)->resize(300, 200) ->save(public_path('postimages/').$image_one);;
    
     
          $data['image']='postimages/'.$image_one;
            DB::table('posts')->where('id',$id)->update($data);
            unlink($oldimage);
           $notification=array(
            'messege'=>'post Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->route('all.post')->with($notification);

    
   
        }else{ //jodi image notunvaba na thaka
            $data['image']=  $oldimage;
            DB::table('posts')->where('id',$id)->update($data);
          
           $notification=array(
            'messege'=>'post Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
        }

    }

    public function destroy($id)
    {
       $post= DB::table('posts')->where('id',$id)->first();
       unlink($post->image);
       DB::table('posts')->where('id',$id)->delete();
       $notification=array(
        'messege'=>'post Successfully delete',
        'alert-type'=>'success'
              );
   return Redirect()->back()->with($notification);


    }

    //jason data return
    
    public function GetSubcat($cat_id)
    {
        // return $cat_id;
       $sub=DB::table('subcategories')->where('category_id',$cat_id)->get();
       return response()->json($sub);
        //
    } 
    public function GetSubdist($dist_id)
    {
        // return $cat_id;
       $sub=DB::table('subdistricts')->where('district_id',$dist_id)->get();
       return response()->json($sub);
        //
    }

}
