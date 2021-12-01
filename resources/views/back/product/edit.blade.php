@extends('layouts.back')
@section('title', 'Edit Product')
@section('content')


    <!-- breadcrumbs + header closing tag -->
    <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('product') }}">Products</a></li>
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
                        <div class="card-header"><strong>Edit </strong>Product</div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{route('product.update', $data->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="nf-name"><strong>Name</strong></label>
                                    <input class="form-control" id="nf-email" type="text" name="name" value="{{ $data->name }}" autocomplete="name">
                                    <span class="help-block text-muted">Please add category Name</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1"><strong>Select Category</strong></label>
                                    <div class="col-md-4">
                                        <select class="form-control" id="category" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ ($data->category_id == $category->id) ? "selected":"" }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <span class="help-block text-muted">Select Category.</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1"><strong>Purchase Price (ZAR)</strong></label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="nf-email" type="text" name="purchase_price" value="{{ $data->purchase_price }}" autocomplete="name">
                                        <span class="help-block text-muted">Please add purchase price.</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1"><strong>Stock</strong></label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="nf-email" type="text" name="stock" value="{{ $data->stock }}" autocomplete="name">
                                        <span class="help-block text-muted">Stock Quantity.</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1"><strong>Selling Price (ZAR)</strong></label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="nf-email" type="text" name="selling_price" value="{{ $data->selling_price }}" autocomplete="name">
                                        <span class="help-block text-muted">Please add selling price.</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nf-description"><strong>Description</strong></label>
                                    <textarea class="form-control" id="description-ckeditor" name="description" required>{!! $data->description !!}</textarea>
                                    <span class="help-block text-muted">Describe Category.</span>
                                </div>

                                <div class="form-group">
                                    <label for="nf-name"><strong>Tag</strong></label>
                                    <input class="form-control" id="nf-email" type="text" name="tag" value="{{ $data->tag }}" autocomplete="name">
                                    <span class="help-block text-muted">Please update product tag.</span>
                                </div>

                                <div class="form-group">
                                    <label for="nf-description"><strong>Image</strong></label>
                                    <br>
                                    <input id="file-input" type="file" name="image">
                                    <br>
                                    <span class="help-block text-muted">Please add jpeg or png image.</span>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1"><strong>Product Status</strong> </label>
                                    <div class="col-md-4">
                                        <select class="form-control form-control-md" id="status" name="status">
                                            <option value="1" {{ ($data->status == '1') ? "selected":"" }}>Active</option>
                                            <option value="0" {{ ($data->status == '0') ? "selected":"" }}>In-active</option>
                                        </select>
                                        <span class="help-block text-muted">Product Status.</span>
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
