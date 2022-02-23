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
              <h4 class="modal-title">update subCategory</h4>
             
               
           
            </div>
            <div class="modal-body">
            <form action="{{ route('update.subdistrict',$subdistricts->id) }}" method="post">
              @csrf
              <div class="form-group">
    <label for="English">Category Name english</label>
    <input type="text" class="form-control @error('subcategory_bn') is-invalid @enderror"  id="bangla" value="{{ $subdistricts->subdistrict_bn }} " name="subdistrict_bn">
    @error('subcategory_bn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="English">Category Name english</label>
    <input type="text" class="form-control @error('category_en') is-invalid @enderror"  id="English" value="{{ $subdistricts->subdistrict_en }} " name="subdistrict_en">
    @error('category_en')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
  </div>
  <div class="form-group">
    <label for="category">Choose Category</label>
    <select class="form-control " name="district_id" required>
   
    @foreach($districts as $district)
    <option value="{{ $district->id }}" <?php if($district->id == $subdistricts->id){ echo "selected";} ?>>{{ $district->district_en }} || {{ $district->district_bn }}||{{ $district->id }} </option>
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