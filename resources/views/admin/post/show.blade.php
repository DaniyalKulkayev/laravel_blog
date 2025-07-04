@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2 ">{{ $post->title }}</h1>
                        <a href="{{ route('admin.category.edit', $post->id) }}" class="pl-2 "><i
                                class="fas fa-edit"></i></a>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <!-- <section class="content">
                                                                                                                                                                                                                                                        <div class="container-fluid">
                                                                                                                                                                                                                                                            <div class="row col-6 pl-0">
                                                                                                                                                                                                                                                                <div class="card col-12">
                                                                                                                                                                                                                                                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                                                                                                                                                                                                                                                        <table class="table table-head-fixed text-nowrap">
                                                                                                                                                                                                                                                                            <tbody>
                                                                                                                                                                                                                                                                                <tr>
                                                                                                                                                                                                                                                                                    <td>ID</td>
                                                                                                                                                                                                                                                                                    <td>{{ $post->id }}</td>
                                                                                                                                                                                                                                                                                </tr>
                                                                                                                                                                                                                                                                                <tr>
                                                                                                                                                                                                                                                                                    <td>Title</td>
                                                                                                                                                                                                                                                                                    <td>{{ $post->title }}</td>
                                                                                                                                                                                                                                                                                </tr>
                                                                                                                                                                                                                                                                            </tbody>
                                                                                                                                                                                                                                                                        </table>
                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                    </section> -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category id: {{ $post->category_id }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div style="display:inline-block" class="w-25">
                        <figure><img src="{{ Storage::url($post->preview_image) }}" name="preview_image" alt="preview"
                                class="w-100"></figure>
                        <figcaption class="mb-3">Preview Image</figcaption>
                    </div>
                    <div style="display:inline-block" class="w-25">
                        <figure style="display:inline-block"><img src="{{ Storage::url($post->main_image) }}"
                                name="main_image" alt="main" class="w-100">
                        </figure>
                        <figcaption class="">Main Image</figcaption>
                    </div>
                    <br>
                    {{ $post->content }}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    @foreach ($post->tags as $tag)
                        <p style="display:inline">#{{ $tag->title }} </p>
                    @endforeach
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
    </div>
@endsection