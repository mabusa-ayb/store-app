@extends('layouts.front')
@section('title', $title)

@section('content')
    @include('front.inc.breadcrumbs')
    @include('front.inc.our-services')
    @include('front.inc.newsletter')
@endsection
