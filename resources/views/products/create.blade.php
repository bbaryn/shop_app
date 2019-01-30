@extends('layout.layout')

@section('content')
    <h1>Add New Product</h1>
    <hr>
     <form action="/products" method="post">
     {{ csrf_field() }}
      <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="productName"  name="name">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="productDescription" name="description">
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" min="0" class="form-control" id="productPrice" name="price" step="0.01">
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
