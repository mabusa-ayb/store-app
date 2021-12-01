@extends('layouts.front')
@section('title', $title)

@section('content')
    @include('front.inc.breadcrumbs')
    @include('front.inc.item_details')
    @include('front.inc.front-modal')
@endsection
