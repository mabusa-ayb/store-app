@extends('layouts.back')
@section('title', 'Create Category')
@section('content')


    <!-- breadcrumbs + header closing tag -->
    <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
            <li class="breadcrumb-item active">Create</li>

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
                        <div class="card-header"><strong>Create</strong> Category</div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nf-name"><strong>Name</strong></label>
                                    <input class="form-control" id="nf-email" type="text" name="name" placeholder="Enter Name.." autocomplete="name">
                                    <span class="help-block text-muted">Please add category Name</span>
                                </div>
                                <div class="form-group">
                                    <label for="nf-description"><strong>Description</strong></label>
                                    <textarea class="form-control" id="description-ckeditor" name="description" required></textarea>
                                    <span class="help-block text-muted">Please describe Category</span>
                                </div>

                                <div class="form-group">
                                    <label for="nf-description"><strong>Image</strong></label>
                                    <br>
                                    <input id="file-input" type="file" name="image" required>
                                    <br>
                                    <span class="help-block text-muted">Please add jpeg or png image.</span>
                                </div>

                                <div class="form-group">
                                    <label for="nf-name"><strong>Status</strong></label>
                                    <div class="col-md-4">
                                        <select class="form-control form-control-md" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">In-active</option>
                                        </select>
                                    </div>
                                    <span class="help-block text-muted">Category Status</span>
                                </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
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
