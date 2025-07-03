@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
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
                    <div class="col-12">
                        <form action="{{ route('admin.post.update',$post->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                             
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control col-6" placeholder="Enter post name..."
                                    value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-6 pl-0">
                                <label>Category</label>
                                <select name='category_id' class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected  ' : ''}}> {{ $category->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-6 pl-0">
                                <label for="exampleInputFile">Preview image</label>
                                <div class="w-25">
                                    <img src="{{ Storage::url($post->preview_image) }}" alt="preview_image"
                                        class="w-100 mb-2">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>

                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-6 pl-0">
                                <label for="exampleInputFile">Main image</label>
                                <div class="w-50">
                                    <img src="{{ Storage::url($post->main_image) }}" alt="main_image" class="w-75 mb-2">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('main_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group" data-select2-id="42">
                                <label>Tags</label>
                                <select class="select2" multiple="" name="tag_ids[]" data-placeholder="Select Tags"
                                    style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                    @foreach ($tags as $tag)
                                        <option {{ is_array(old('tag_ids', $post->tags->pluck('id'))->toArray()) && in_array($tag->id, old('tag_ids', $post->tags->pluck('id'))->toArray()) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach


                                </select>
                                @error('tags_id')
                                    <p class="text-danger">Choose at least 1 tag</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary col-1" value="Update">
                            </div>
                        </form>

                    </div>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection