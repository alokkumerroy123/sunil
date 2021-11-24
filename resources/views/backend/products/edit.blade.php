@extends('layouts.backend')
@section('main')
<div class="row mt-3">
  <h2 class="text-center">পণ্য সম্পাদনা করুন</h2>
	<div class="col-md-3"></div>
	<div class="col-md-6">
<form action="{{route('admin.product.edit',$product->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">নাম</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
  </div>

    <div class="mb-3">
    <label for="price" class="form-label">মূল্য</label>
    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" >
  </div>
   <div class="mb-3">
    <label for="discount" class="form-label">ডিসকাউন্ট</label>
    <input type="number" class="form-control" id="discount" name="discount" value="{{$product->discount}}" >
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">বর্ণনা</label>
    <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
  </div>
    <div class="mb-3">
    <label for="photo" class="form-label">ছবি</label>
    <input type="file" class="form-control" id="photo" name="photo" class="form-control" >
      <img src="{{asset('uploads/products/'.$product->photo)}}" width="100px" class="m-3">
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
	
</div>
@endsection