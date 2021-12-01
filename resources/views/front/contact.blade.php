@extends('layouts.front')
@section('title', $title)

@section('content')
    @include('front.inc.breadcrumbs')
    @include('front.inc.contact_details')
    @include('front.inc.newsletter')
    @include('front.inc.front-modal')
@endsection
@push('js')
    <!-- Easing JS -->
    <script src="{{ asset('public/assets/js/easing.js') }}"></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
    <script src="{{ asset('public/assets/js/gmap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/map-script.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('public/assets/js/active.js') }}"></script>
@endpush
