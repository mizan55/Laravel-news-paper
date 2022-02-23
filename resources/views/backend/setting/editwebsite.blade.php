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

   

            <!--modal-->
            <div  >
        <div class="container "  >
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">update website</h4>
             
               
           
            </div>
            <div class="modal-body">
            <form action="{{ route('update.website',$website->id) }}" method="post">
              @csrf
  <div class="form-group">
    <label for="Bangla">website Name</label>
    <input type="text" class="form-control @error('category_bn') is-invalid @enderror"  id="Bangla" aria-describedby="emailHelp" value="{{ $website->website_name }}" name="website_name">
    @error('category_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="English">Category Name Bangla</label>
    <input type="text" class="form-control @error('category_en') is-invalid @enderror"  id="English" value="{{ $website->website_link }} " name="website_link">
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