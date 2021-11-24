@extends('layouts.backend')
@section('main')
<div class="row mt-3">
  <h2 class="text-center">পণ্য তৈরি করুন</h2>
	<div class="col-md-3"></div>
	<div class="col-md-6">
<form action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
<label for="name" class="form-label">নাম</label>
  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

    <div class="mb-3">
    <label for="price" class="form-label">মূল্য</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}" required>
     @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

   <div class="mb-3">
    <label for="discount" class="form-label">ডিসকাউন্ট</label>
    <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" value="{{old('discount')}}" required>
      @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">বর্ণনা</label>
    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{old('description')}}</textarea>
      @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>

     <div class="mb-3">
    <label for="photo" class="form-label">ছবি</label>
    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" class="form-control" required>
     @error('photo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
	
</div>
@endsection