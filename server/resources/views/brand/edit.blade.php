@extends('layouts.main')
@section('content')
@include('partials.navigation')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('brand.update', $brand->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="name" value="{{ $brand->name }}" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
