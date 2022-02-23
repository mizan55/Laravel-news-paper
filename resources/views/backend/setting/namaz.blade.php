@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Namaz setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Namaz setting </li>
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
              <h4 class="modal-title">Namaz setting</h4>
             
               
           
            </div>
            <div class="modal-body">
            <form action="{{ route('update.namaz',$namaz->id) }}" method="post">
              @csrf
 
  <div class="form-group">
    <label for="Bangla">fajr</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $namaz->fajr }}" name="fajr" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">juhar</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $namaz->juhar }}" name="juhar" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">asor</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $namaz->asor }}" name="asor" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">magrib</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $namaz->magrib }}" name="magrib" required="">
   
  </div>
  <div class="form-group">
    <label for="Bangla">isha</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" value="{{ $namaz->isha }}" name="isha" required="">
   
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