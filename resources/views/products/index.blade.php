@extends('layout.layout')

@section('content')
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            @foreach($products as $product)
            <tr>
              <th scope="row">{{$no++}}</th>
              <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
              <td>{{$product->description}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->created_at->format('d M Y - H:i:s')}}</td>
              <td>{{$product->updated_at->format('d M Y - H:i:s')}}</td>
              <td>
              <div class="btn-group" role="group" aria-label="Basic example">
                  <a href="{{ URL::to('products/' . $product->id . '/edit') }}">
                  	<button type="button" class="btn btn-warning">Edit</button>
                  </a>&nbsp;
                  <form action="{{url('products', [$product->id])}}" method="POST">
          					     <input type="hidden" name="_method" value="DELETE">
         						<input type="hidden" name="_token" value="{{ csrf_token() }}">
         						<input type="submit" class="btn btn-danger" value="Delete"/>
         				  </form>
              </div>
			       </td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endsection
