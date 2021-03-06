  @extends('layouts.backend')

@section('main')
<div class="mt-3">
  <h2 class="text-center">সুনীল মিষ্টান্ন ভান্ডার পণ্য তালিকা</h2>
  <a href="{{route('admin.product.create')}}" class="btn btn-success">নতুন পণ্য যোগ করুন</a>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">সিরিয়াল</th>
      <th scope="col">নাম</th>
      <th scope="col">মূল্য</th>
      <th scope="col">ডিসকাউন্ট</th>
      <th scope="col">বর্ণনা</th>
      <th scope="col">ছবি</th>
      <th scope="col">কর্ম</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $key=>$product)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->discount}}</td>
      <td>{{$product->description}}</td>
      <td>
        <img src="{{asset('uploads/products/'.$product->photo)}}" width="100px">
      </td>
      <td>
    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-warning">Edit</a>
    <a href="{{route('admin.product.delete',$product->id)}}" class="btn btn-danger ">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$products->links()}}
</div>
@endsection