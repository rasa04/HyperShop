@extends('layouts.main')
@section('content')
@include('partials.navigation')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
