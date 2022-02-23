@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- data table copy kora akahana... -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Category</h3>
                <button type="button" class="btn btn-danger btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">Add new</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>district Name Bangla</th>
                    <th>district Name English</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ( $districts as $district )
                    <tr>
                    <td>{{ $district->district_bn   }}</td>
                    <td>
                    {{ $district->district_en   }}
                    </td>
                    <td>
                      
                      <a href="{{ route('delete.district',$district->id ) }}" class="btn btn-danger" id="delete"><i class="far fa-trash-alt"> delete</i></a>
                      <a href=" {{URL::to('update/district/' .$district->id ) }}" class="btn btn-info"><i class="fas fa-edit"> update</i></a>
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
              <h4 class="modal-title">Insert New Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('store.district') }}" method="post">
              @csrf
  <div class="form-group">
    <label for="Bangla">Category Name Bangla</label>
    <input type="text" class="form-control @error('district_bn') is-invalid @enderror"  id="Bangla" aria-describedby="emailHelp" placeholder="Disrict Name Bangla" name="district_bn">
    @error('district_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="English">Category Name english</label>
    <input type="text" class="form-control @error('district_en') is-invalid @enderror"  id="English" placeholder="Disrict Name Eng" name="district_en">
    @error('district_en')
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