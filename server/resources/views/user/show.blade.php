@extends('layouts.main')
@section('content')
@include('partials.navigation')

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form method="post" action="{{ route('user.delete', $user->id) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Display name</td>
                                        <td>{{ $user->display_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Verified at</td>
                                        <td>{{ $user->email_verified_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $user->genderTitle }}</td>
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
