@extends('layouts.front')
@section('title', $title)

@section('content')
    @include('front.inc.breadcrumbs')
    @include('front.inc.checkout_form')
    @include('front.inc.front-modal')
@endsection
