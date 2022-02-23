@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Photo Gallery</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Photo Gallery</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- data table copy kora akahana... -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Photo Gallery</h3>
                <button type="button" class="btn btn-danger btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">Add new</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>type</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ( $images as $image )
                    <tr>
                    <td>{{ $image->title   }}</td>
                    <td>
                        <img src="{{ asset($image->photo) }}" alt="" style="height:70px; width:90px;">
                        {{-- <img src="{{ URL::to($image->photo) }}" alt="" style="height:40px; width:80px;"> --}}
                    
                    </td>
                    <td>
                        @if($image->type==1)
                      <span class="badge badge-success">Big Photo</span>
                      @else()
                      <span class="badge badge-info">small Photo</span>
                      @endif
                    </td>
                    <td>
                      
                      <a href="{{ route('delete.photo',$image->id ) }}" class="btn btn-danger" id="delete"><i class="far fa-trash-alt"> delete</i></a>
                      <a href=" {{URL::to('edit/photo/' .$image->id ) }}" class="btn btn-info"><i class="fas fa-edit"> edit</i></a>
                    </td>
                    
                   
                   
                  </tr>
                    @endforeach
                 
                 
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!--modal-->
            <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert Photo </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('store.photo') }}" method="post" enctype="multipart/form-data">
              @csrf
  <div class="form-group">
    <label for="Bangla">Title</label>
    <input type="text" class="form-control @error('category_bn') is-invalid @enderror"  id="Bangla" aria-describedby="emailHelp" placeholder="title" name="title">
    @error('category_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputfile" name="photo" required="">
        <label class="custom-file-label" for="exampleInputFile" >upload file</label>
      </div>
      
    </div>
  </div>
  <div class="form-group">
    <label for="Bangla">type</label>
    <select name="type"  class="form-control">
        <option value="1">Big Photo</option>
        <option value="0">Small Photo</option>
    </select>
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