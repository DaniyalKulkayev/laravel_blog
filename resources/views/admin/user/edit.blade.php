@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user: "{{ $user->name }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

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

                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="col-5"
                        style="display: inline-block;">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" class="btn btn-block btn-primary col-2 d-inline" value="Update">

                    </form>

                </div>



            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection