@extends('layouts.front')
@section('title', 'Something for Everyone')

@section('content')
    @include('front.inc.hero')
    @include('front.inc.small-banner')
    @include('front.inc.products')
    @include('front.inc.version')
    @include('front.inc.blog')
    @include('front.inc.newsletter')
    @include('front.inc.front-modal')
@endsection
