@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>product name</th>
            <th>product description</th>
            <th>Image</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->category->category_name }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_description }}</td>
                <td><img src="{{ $product->full_product_url ?? '' }}" alt="Logo" height="50" /></td>
                <td>{{ $product->product_status ? 'Active' : 'Deactive' }}</td>

                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
