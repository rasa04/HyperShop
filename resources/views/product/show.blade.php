@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
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


    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form method="post" action="{{ route('product.delete', $product->id) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <img width="191" height="206" src="{{ Storage::url($product->photo) }}">
                            <img src="{{ $product->photo }}" alt="временно для разработки что бы фото из сидера показывать">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>About</td>
                                        <td>{{ $product->about }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>{{ $product->getRelatedCategory()->name ?? 'no' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Brand</td>
                                        <td>{{ $product->getRelatedBrand()->name ?? 'no' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
