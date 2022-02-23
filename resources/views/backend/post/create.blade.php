@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Post Insert Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Post Insert Panel</li>
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Title Bangla</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title_english" name="title_bn">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Title English</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="title_english" name="title_en">
                </div>
              </div>
          
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Category</label>
                  <select name="cat_id" id="" class="form-control">
                    <option selected="" disabled="">==choose one==</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_bn }} || {{ $category->category_en }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Subcatgory</label>
                 <select name="subcat_id" id="subcat_id"  class="form-control">
                   <option value=""></option>
                 </select>
                </div>
              </div>
          
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Division</label>
                  <select name="dist_id"  class="form-control">
                    <option selected="" disabled="">==choose one==</option>
                    @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->district_bn }} || {{ $district->district_en }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">district</label>
                 <select name="subdist_id" id="subdist_id"  class="form-control">
                   <option value=""></option>
                 </select>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputfile" name="image" required="">
                    <label class="custom-file-label" for="exampleInputFile" >Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Tags Bangla</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tags_bangla" name="tags_bn">
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword1">Tags English</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="tags_english" name="tags_en">
                </div>
              </div>
          
              <div class="form-group">
                <label for="jy">details en</label>
                <textarea class="summernote" name="details_en" >
                  Place <em>some</em> <u>text</u> <strong>here</strong>
                </textarea>
              </div>
              <div class="form-group">
                <label for="jy">details bn</label>
                <textarea class="summernote" name="details_bn" >
                  Place <em>some</em> <u>text</u> <strong>here</strong>
                </textarea>
              </div>
              <hr>
              <h4 class="text-center">Extra option</h4>
              
             
              
          <div class=" form-group">
            <div class="row">
            <div class="form-check col-md-3">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1">
              <label class="form-check-label" for="exampleCheck1">Headline</label>
            </div>
            <div class="form-check col-md-3" >
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumbnail" value="1">
              <label class="form-check-label" for="exampleCheck1">General big thumbnail</label>
            </div>
            <div class="form-check col-md-3">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="firstsection" value="1">
              <label class="form-check-label" for="exampleCheck1">First section</label>
            </div>
            <div class="form-check col-md-3">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumbnail" value="1">
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
 

  
