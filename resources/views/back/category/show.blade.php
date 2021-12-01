@extends('layouts.back')
@section('title', 'View Category')
@section('content')


    <!-- breadcrumbs + header closing tag -->
    <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('category') }}">Categories</a></li>
            <li class="breadcrumb-item">View</li>
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
                        <div class="card-header"><strong>View </strong>Category</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Name</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">{{ $data->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Description</strong></p>
                                </div>
                                <div class="col-md-6">
                                    {!! $data->description !!}
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Status</strong></p>
                                </div>
                                <div class="col-md-6">
                                    @if($data->status == '1')
                                        <button class="btn btn-sm btn-success" type="button">Active</button>
                                    @elseif($data->status == '0')
                                        <button class="btn btn-sm btn-light" type="button">In-active</button>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Image</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('public/images/category/'.$data->image_path) }}" width="300px">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ url('category/'.$data->id.'/edit') }}" class="btn btn-secondary" type="button" data-toggle="tooltip" data-placement="top" title="Edit Category" data-original-title="Edit Category">Edit Category <i class='nav-icon fas fa-edit'></i></a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ route('category/delete_category', $data->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Delete Category">Delete Category <i class='nav-icon fas fa-trash-alt'></i></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </main>

        <!--/ main content closing </div> in footer section-->

@endsection
