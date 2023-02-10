@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" id="" class="form-control">
                    <option value="">Please Select</option>
                    @foreach ($categoryData as $categoryDatas)
                        <option value="{{ $categoryDatas->id }}"
                            @if ($product->category_id == $categoryDatas->id) {{ 'selected="selected"' }} @endif>
                            {{ $categoryDatas->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"
                        placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Description:</strong>
                    <textarea class="form-control" style="height:150px" name="product_description" placeholder="Detail">{{ $product->product_description }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Image:</strong>
                    <input type="file" class="form-control" name="product_image" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="product_status" id="" class="form-control">
                        <option value="">Please Select</option>
                        <option value="1" @if($product->product_status == '1') {{ 'selected="selected"' }} @endif>Active</option>
                        <option value="2" @if($product->product_status == '2') {{ 'selected="selected"' }} @endif>Deactive</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
