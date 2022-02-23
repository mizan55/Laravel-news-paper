@extends('layouts.app')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SubCategories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">SubCategories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- data table copy kora akahana... -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">All subdistricts</h3>
                <button type="button" class="btn btn-danger btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">Add SubCategory</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>subdistrict Name Bangla</th>
                    <th>subdistrict Nsme English</th>
                    <th>district</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ( $subdistricts as $subdistrict )
                    <tr>
                    <td>{{ $subdistrict->subdistrict_bn   }}</td>
                    <td>
                    {{ $subdistrict->subdistrict_en  }}
                    <td>
                    {{ $subdistrict->district_en }} ||  {{ $subdistrict->district_bn }} 
                    </td>
                    </td>
                    <td>
                      
                      <a href="{{ route('delete.subdistrict',$subdistrict->id ) }}" class="btn btn-danger" id="delete"><i class="far fa-trash-alt"> delete</i></a>
                      <a href=" {{URL::to('update/subdistrict/' .$subdistrict->id ) }}" class="btn btn-info"><i class="fas fa-edit"> update</i></a>
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
            <form action="{{ route('store.subdistrict') }}" method="post">
              @csrf
  <div class="form-group">
    <label for="Bangla">subCategory Name Bangla</label>
    <input type="text" class="form-control @error('subdistrict_bn') is-invalid @enderror"  id="Bangla" aria-describedby="emailHelp" placeholder="subdistrict Bangla" name="subdistrict_bn">
    @error('subdistrict_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="English">subdistrict english</label>
    <input type="text" class="form-control @error('subdistrict_en') is-invalid @enderror"  id="English" placeholder="Category Name Bangla" name="subdistrict_en">
    @error('subdistrict_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="category">Choose Category</label>
    <select class="form-control " name="district_id" required>
    <option disabled="" selected="">Chose One</option>
    @foreach($districts as $district)
    <option value="{{ $district->id }} ">{{ $district->district_en }} || {{ $district->district_bn }}||{{ $district->id }} </option>
    @endforeach
   
    
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