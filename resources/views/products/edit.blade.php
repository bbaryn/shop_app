@extends('layout.layout')

@section('content')
    <h1>Edit Product</h1>
    <hr>
     <form action="{{url('products', [$product->id])}}" method="POST">
     <input type="hidden" name="_method" value="PUT">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" value="{{$product->name}}" class="form-control" id="productName"  name="name" >
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" value="{{$product->description}}" class="form-control" id="productDescription" name="description" >
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" min="0" value="{{$product->price}}" class="form-control" id="priceDescription" name="price" step="0.01">
      </div>
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
