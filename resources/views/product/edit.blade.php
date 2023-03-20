@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('patch')
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
