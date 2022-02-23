<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ImportantWebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites=DB::table('websites')->get();
        // dd($websites);
       return view('backend.setting.website',compact('websites'));
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
        $data['website_name']=$request->website_name;
        $data['website_link']=$request->website_link;
        DB::table('websites')->insert($data);
        $notification=array(
            'messege'=>'website name an url Successfully added',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
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
        $website= DB::table('websites')->where('id',$id)->first();
        return view('backend.setting.editwebsite',compact('website'));
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
        $data = array();
        $data['website_name']=$request->website_name;
        $data['website_link']=$request->website_link;
        DB::table('websites')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'Category Successfully added',
            'alert-type'=>'success'
                  );
                //   return Redirect()->back()->with($notification);
                  return Redirect()->route('important.website')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('websites')->where('id',$id)->delete();
        $notification=array(
         'messege'=>'Category Successfully delete',
         'alert-type'=>'success'
               );
    return Redirect()->back()->with($notification);
    }
}
