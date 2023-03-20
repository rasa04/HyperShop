@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
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
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" value="{{ old('display_name') ?? $user->display_name }}" name="display_name" class="form-control" placeholder="Display name">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('username') ?? $user->username }}" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div  class="form-group">
                        <select name="gender" class="custom-select form-control" id="">
                            <option disabled selected>Gender</option>
                            <option {{ old('gender') ?? ($user->gender === 1 ? 'selected' : '')}} value="1"> Male </option>
                            <option {{ old('gender') ?? ($user->gender === 2 ? 'selected' : '')}} value="2"> Female </option>
                        </select>
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
