<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices=DB::table('notices')->first();
        return view('backend.setting.notice',compact('notices'));
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
        //
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
        //
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
        $data['notice']=$request->notice;
       
        DB::table('notices')->where('id',$id)->update($data);
        $notification=array(
            'messege'=>'tv Successfully added',
            'alert-type'=>'success'
                  );
                  return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        DB::table('notices')->where('id',$id)->update(['status'=>1]);
        $notification=array(
            'messege'=>'tv activated',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
    }
    public function deactive($id)
    {
        DB::table('notices')->where('id',$id)->update(['status'=>0]);
        $notification=array(
            'messege'=>'tv deactivated',
            'alert-type'=>'success'
                  );
       return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
