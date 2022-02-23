@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
@php
  $sub=DB::table('subcategories')->where('category_id',$posts->cat_id)->get();
  $subdist=DB::table('subdistricts')->where('district_id',$posts->subdist_id)->get();
@endphp
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">edit post Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">edit post Panel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>



    
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">edit post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="{{ route('update.post',$posts->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Title Bangla</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title_english" name="title_bn" value="{{ $posts->title_bn }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Title English</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="title_english" name="title_en" value="{{ $posts->title_en }}">
                </div>
              </div>
          
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Category</label>
                  <select name="cat_id" id="" class="form-control">
                    <option selected="" disabled="">==choose one==</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" <?php if($posts->cat_id==$category->id){echo "selected";}?>>{{ $category->category_bn }} || {{ $category->category_en }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Subcatgory</label>
                 <select name="subcat_id" id="subcat_id"  class="form-control">
                  <option selected="" disabled="">==choose one==</option>
                  @foreach($sub as $category)
                  <option value="{{ $category->id }}" <?php if($posts->cat_id==$category->id){echo "selected";}?>>{{ $category->subcategory_bn }} || {{ $category->subcategory_en }}</option>
                  @endforeach
                 </select>
                </div>
              </div>
          
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Division</label>
                  <select name="dist_id"  class="form-control">
                    <option selected="" disabled="">==choose one==</option>
                    @foreach($districts as $district)
                    <option value="{{ $district->id }}" <?php if($posts->dist_id==$district->id){echo "selected";}?>>{{ $district->district_bn }} || {{ $district->district_en }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">sub district</label>
                
                  <select name="subdist_id" id="subdist_id"  class="form-control">
                    <option selected="" disabled="">==choose one==</option>
                  @foreach($subdist as $category)
                  <option value="{{ $category->id }}" <?php if($posts->subdist_id==$category->id){echo "selected";}?>>{{ $category->subdistrict_bn }} || {{ $category->subdistrict_en }}</option>
                  @endforeach
                 </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputfile" name="image" >
                      <label class="custom-file-label" for="exampleInputFile" >Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputFile">Old Image</label> <br>
                  <img src="{{ URL::to($posts->image) }}" alt="" style="height:38px; width:70px;border-radius:5px;">
                  <input type="hidden" name="oldimage" value="{{ $posts->image }}">
                </div>
              </div>
             

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Tags Bangla</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tags_bangla" name="tags_bn" value="{{ $posts->tags_bn }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Tags English</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="tags_english" name="tags_en" value="{{ $posts->tags_en }}">
                </div>
              </div>
          
              <div class="form-group">
                <label for="jy">details en</label>
                <textarea class="summernote" name="details_en" >
                  {{ $posts->details_en }}
                </textarea>
              </div>
              <div class="form-group">
                <label for="jy">details bn</label>
                <textarea class="summernote" name="details_bn" >
                  {{ $posts->details_bn }}
                </textarea>
              </div>
              <hr>
              <h4 class="text-center">Extra option</h4>
              
             
              
          <div class=" form-group">
            <div class="row">
            <div class="form-check col-md-3">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1" <?php if($posts->headline==1){echo "checked";}?>>
              <label class="form-check-label" for="exampleCheck1">Headline</label>
            </div>
            <div class="form-check col-md-3" >
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumbnail" value="1" <?php if($posts->bigthumbnail==1){echo "checked";}?>>
              <label class="form-check-label" for="exampleCheck1">General big thumbnail</label>
            </div>
            <div class="form-check col-md-3">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section" value="1" <?php if($posts->first_section==1){echo "checked";}?> >
              <label class="form-check-label" for="exampleCheck1">First section</label>
            
            </div>
            <div class="form-check col-md-3">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumbnail" value="1" <?php if($posts->first_section_thumbnail==1){echo "checked";}?> >
              <label class="form-check-label" for="exampleCheck1">First section big thumbnail</label>
            </div> 
          </div>
        </div>
          
          
             
             
          
               
                
             
              <!-- /.card-body -->
              <br>
          
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            </form>
          

  
             
             
            </div>
          </div>
        </div>
      </div>


      <script>
        $(document).ready(function() {
       $('select[name="cat_id"]').on('change',function(){
           var cat_id=$(this).val();
           if(cat_id) {
               $.ajax({
                   url:"{{ url('/get/subcat/') }}/"+cat_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                      $("#subcat_id").empty();
                      $.each(data,function(key,value) {
                        $("#subcat_id").append('<option value="'+value.id+'">'+value.subcategory_bn+'||'+value.subcategory_en+'</option>');
                      });
                   },
               });
           }else{
               alert('danger');
           }
          
       });
      });
      </script>
      

      <script>
        $(document).ready(function() {
       $('select[name="dist_id"]').on('change',function(){
           var dist_id=$(this).val();
           if(dist_id) {
               $.ajax({
                   url:"{{ url('/get/subdist/') }}/"+dist_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                     
                    $("#subdist_id").empty();
                      $.each(data,function(key,value) {
                        $("#subdist_id").append('<option value="'+value.id+'">'+value.subdistrict_bn+'||'+value.subdistrict_en+'</option>');
                      });
                   },
               });
           }else{
               alert('danger');
           }
          
       });
      });
      </script>
      
  @endsection
 

  
