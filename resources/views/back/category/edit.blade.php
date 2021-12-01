@extends('layouts.back')
@section('title', 'Edit Category')
@section('content')


    <!-- breadcrumbs + header closing tag -->
    <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('category') }}">Categories</a></li>
            <li class="breadcrumb-item">Edit</li>
            <li class="breadcrumb-item active">{{ $data->name }}</li>

        </ol>
    </div>
    </header>
    <!--/ breadcrumbs + header closing tag -->

    <!-- main content closing </div> in footer section-->
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <div class="card">
                        <div class="card-header"><strong>Edit </strong>Category</div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{route('category.update', $data->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="nf-name"><strong>Name</strong></label>
                                    <input class="form-control" id="nf-email" type="text" name="name" value="{{ $data->name }}" autocomplete="name" required>
                                    <span class="help-block text-muted">Update category name</span>
                                </div>

                                <div class="form-group">
                                    <label for="nf-description"><strong>Description</strong></label>
                                    <textarea class="form-control" id="description-ckeditor" name="description" required> {!! $data->description !!}</textarea>
                                    <span class="help-block text-muted">Update Category Description</span>
                                </div>

                                <div class="form-group">
                                    <label for="nf-description"><strong>Image</strong></label>
                                    <br>
                                    <input id="file-input" type="file" name="image">
                                    <br>
                                    <span class="help-block text-muted">update image.</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1"><strong>Category Status</strong> </label>
                                    <div class="col-md-4">
                                        <select class="form-control form-control-md" id="status" name="status">
                                            <option value="1" {{ ($data->status == '1') ? "selected":"" }}>Active</option>
                                            <option value="0" {{ ($data->status == '0') ? "selected":"" }}>In-active</option>
                                        </select>
                                        <span class="help-block text-muted">Product Status.</span>
                                    </div>
                                </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> Update</button>
                            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </main>

        <!--/ main content closing </div> in footer section-->

        @endsection
        @push('js')
            <script src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace( 'description-ckeditor' );
            </script>
    @endpush
