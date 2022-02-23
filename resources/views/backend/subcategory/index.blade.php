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
                <h3 class="card-title">All SubCategory</h3>
                <button type="button" class="btn btn-danger btn-sm" style="float: right;" data-toggle="modal" data-target="#modal-default">Add SubCategory</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SubCategory Name Bangla</th>
                    <th>SubCategory Nsme English</th>
                    <th>Category</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ( $subcategories as $subcategory )
                    <tr>
                    <td>{{ $subcategory->subcategory_bn   }}</td>
                    <td>
                    {{ $subcategory->subcategory_en  }}
                    <td>
                    {{ $subcategory->category_en }} ||  {{ $subcategory->category_en }} 
                    </td>
                    </td>
                    <td>
                      
                      <a href="{{ route('delete.subcategory',$subcategory->id ) }}" class="btn btn-danger" id="delete"><i class="far fa-trash-alt"> delete</i></a>
                      <a href=" {{URL::to('update/subcategory/' .$subcategory->id ) }}" class="btn btn-info"><i class="fas fa-edit"> update</i></a>
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
            <form action="{{ route('store.subcategory') }}" method="post">
              @csrf
  <div class="form-group">
    <label for="Bangla">subCategory Name Bangla</label>
    <input type="text" class="form-control @error('subcategory_bn') is-invalid @enderror"  id="Bangla" aria-describedby="emailHelp" placeholder="Category Name Bangla" name="subcategory_bn">
    @error('subcategory_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="English">subCategory Name english</label>
    <input type="text" class="form-control @error('subcategory_en') is-invalid @enderror"  id="English" placeholder="Category Name Bangla" name="subcategory_en">
    @error('subcategory_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
  </div>

  <div class="form-group">
    <label for="category">Choose Category</label>
    <select class="form-control " name="category_id" required>
    <option disabled="" selected="">Chose One</option>
    @foreach($categories as $category)
    <option value="{{ $category->id }}">{{ $category->category_en }} || {{ $category->category_bn }}||{{ $category->id }} </option>
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