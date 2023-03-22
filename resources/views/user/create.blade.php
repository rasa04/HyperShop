@extends('layouts.main')
@section('content')
@include('partials.navigation')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{ old('display_name') }}" name="display_name" class="form-control" placeholder="Display name">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('username') }}" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation"
                               class="form-control" placeholder="Confirm the password">
                    </div>
                    <div  class="form-group">
                        <select name="gender" class="custom-select form-control" id="">
                            <option disabled selected>Gender</option>
                            <option {{ old('gender') == 1 ? 'selected' : ''}} value="1"> Male </option>
                            <option {{ old('gender') == 2 ? 'selected' : ''}} value="2"> Female </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create">
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
