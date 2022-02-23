@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">website</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">website</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- data table copy kora akahana... -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">All website</h3>
                <button type="button" class="btn btn-danger btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">Add new</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>website name</th>
                    <th>website link</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ( $websites as $website )
                    <tr>
                    <td>{{ $website->website_name   }}</td>
                    <td>
                    {{ $website->website_link  }}
                    </td>
                    <td>
                      
                      <a href="{{ route('delete.website',$website->id ) }}" class="btn btn-danger" id="delete"><i class="far fa-trash-alt"> delete</i></a>
                      <a href=" {{URL::to('edit/website/' .$website->id ) }}" class="btn btn-info"><i class="fas fa-edit"> update</i></a>
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
              <h4 class="modal-title">Insert New website</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('store.website') }}" method="post">
              @csrf
  <div class="form-group">
    <label for="Bangla">website Name </label>
    <input type="text" class="form-control @error('category_bn') is-invalid @enderror"  id="website_name" aria-describedby="emailHelp" placeholder=" website_name" name="website_name">
    @error('category_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="English">website link </label>
    <input type="text" class="form-control @error('category_en') is-invalid @enderror"  id="English" placeholder="website_link " name="website_link">
    @error('category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
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