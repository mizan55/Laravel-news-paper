@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Notice setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Notice setting</li>
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
              <h4 class="modal-title">Notice setting</h4>
              @if($notices->status==0)
              <a href="{{ route('active.notice',$notices->id) }}"class="btn btn-success"> activate</a>
              @else
              
              <a href="{{ route('deactive.notice',$notices->id) }}"class="btn btn-danger">dectivated</a>
              @endif
            </div>
            <div class="modal-body">
            <form action="{{ route('update.notice',$notices->id) }}" method="post">
              @csrf
 
  <div class="form-group">
    <label for="Bangla">notice</label>
    <textarea type="text" class="form-control"  aria-describedby="emailHelp" name="notice" required="">
        {{ $notices->notice }}
    </textarea>
    @if($notices->status==0)
    <small class="text-danger">notice now deactivated</small>
    @else
    <small class="text-success">notice now activated</small>
    @endif
   
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