@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2 ">{{ $category->title }}</h1>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="pl-2 "><i
                                class="fas fa-edit"></i></a>
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

                <div class="row col-6 pl-0">
                    <div class="card col-12">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <tbody>

                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $category->id }}</td>

                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $category->title }}</td>

                                    </tr>
                                    <tr>
                                        <td>Post ID</td>
                                        <td></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>



            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection