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
            <form action="{{ route('update.seo',$seos->id) }}" method="post">
              @csrf
 
<div class="form-group">
    <label for="Bangla">meta_author</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->meta_author }}" name="meta_author" required="">
</div>
<div class="form-group">
    <label for="Bangla">meta_title</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->meta_title }}" name="meta_title" required="">
</div>
<div class="form-group">
    <label for="Bangla">meta_keyword</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->meta_keyword }}" name="meta_keyword" required="">
</div>
<div class="form-group">
    <label for="Bangla">meta_description</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->meta_description }}" name="meta_description" required="">
</div>
<div class="form-group">
    <label for="Bangla">google_verification</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->google_verification }}" name="google_verification" required="">
</div>
<div class="form-group">
    <label for="Bangla">google_analytics</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->google_analytics }}" name="google_analytics" required="">
</div>
<div class="form-group">
    <label for="Bangla">alexa_analytics</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $seos->alexa_analytics }}" name="alexa_analytics" required="">
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