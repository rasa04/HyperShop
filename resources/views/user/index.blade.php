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
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Create</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Display name</th>
                                    <th>Username</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Email verified at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $user->id) }}">{{ $user->display_name }}</a>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->age ?? '?' }} y.o</td>
                                    <td>{{ $user->genderTitle }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at }}</td>
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
