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

   

            <!--modal-->
            <div  >
        <div class="container "  >
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert New district</h4>
             
               
           
            </div>
            <div class="modal-body">
            <form action="{{ route('update.district',$district->id) }}" method="post">
              @csrf
  <div class="form-group">
    <label for="Bangla">district Name Bangla</label>
    <input type="text" class="form-control @error('district_bn') is-invalid @enderror"  id="Bangla" aria-describedby="emailHelp" value="{{ $district->district_bn }}" name="district_bn">
    @error('district_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div>
  <div class="form-group">
    <label for="English">district Name Bangla</label>
    <input type="text" class="form-control @error('district_en') is-invalid @enderror"  id="English" value="{{ $district->district_en }} " name="district_en">
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