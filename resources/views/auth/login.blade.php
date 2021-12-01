@extends('layouts.login')
@section('title', 'Login')
@section('content')
    <div class="col-md-8">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Sign In to your account</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"><span class="input-group-text">
                                <svg class="c-icon">
                                <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                                </svg></span>
                            </div>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend"><span class="input-group-text">
                                <svg class="c-icon">
                                <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-success px-4" type="submit">Login</button>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-link px-0" type="button">Forgot password?</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card text-white bg-success py-5 d-md-down-none" style="width:44%; color: #FF0D06;">
                <div class="card-body text-center">
                    <div>
                        <h2>Sign up</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
