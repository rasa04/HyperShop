@extends('layouts.main')
@section('content')
@include('partials.navigation')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    @foreach($product->images as $image)
                        <img width="191" height="206" src="{{ Storage::url($image) }}">
                    @endforeach
                    <div class="form-group">
                        <label for="">File input (image 1)</label>
                        <div class="input-group">
                            <input name="product_images[]"
                                   type="file"
                                   class="custom-file-input"
                                   id="photo"
                            >
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">File input (image 1)</label>
                        <div class="input-group">
                            <input name="product_images[]"
                                   type="file"
                                   class="custom-file-input"
                                   id="photo"
                            >
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">File input (image 1)</label>
                        <div class="input-group">
                            <input name="product_images[]"
                                   type="file"
                                   class="custom-file-input"
                                   id="photo"
                            >
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if ($category->id == old('category')) selected="selected" @endif
                                    > {{ $category->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand_id" class="form-control">
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" @if ($brand->id == old('brand')) selected="selected" @endif
                                    > {{ $brand->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group">
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="about" cols="30" rows="10" class="form-control" placeholder="Content">{{ $product->about }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
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
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
