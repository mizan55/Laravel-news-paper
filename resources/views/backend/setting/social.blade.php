@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Social setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">social setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

   

            <!--modal-->
            <div  >
        <div class="container "  >
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert social</h4>
             
               
           
            </div>
            <div class="modal-body">
            <form action="{{ route('update.social',$socials->id) }}" method="post">
              @csrf
 
  <div class="form-group">
    <label for="Bangla">Facebook</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $socials->facebook }}" name="facebook" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">twitter</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $socials->twitter }}" name="twitter" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">youtube</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $socials->youtube }}" name="youtube" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">instagram</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $socials->instagram }}" name="instagram" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">linkedin</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $socials->linkedin }}" name="linkedin" required="">
   
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    @endsection