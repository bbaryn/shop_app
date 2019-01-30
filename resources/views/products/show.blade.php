@extends('layout.layout')

@section('content')
            <h1>Showing Product {{ $product->title }}</h1>

    <div class="jumbotron text-center">
        <p>
            <strong>Product Name:</strong> {{ $product->name }}<br>
            <strong>Description:</strong> {{ $product->description }}<br>
            <strong>Price:</strong> {{ $product->price }}
        </p>
    </div>
@endsection
