@extends('layouts.front')
@section('title', $title)

@section('content')
    @include('front.inc.breadcrumbs')
    @include('front.inc.checkout-completed')
    @include('front.inc.newsletter')
@endsection
