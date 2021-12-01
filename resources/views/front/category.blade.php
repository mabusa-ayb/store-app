@extends('layouts.front')
@section('title', $title)

@section('content')
    @include('front.inc.breadcrumbs')
    @include('front.inc.product_category')
    @include('front.inc.front-modal')
@endsection
