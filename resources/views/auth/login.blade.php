@extends('template.auth')

@section('content')
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="{{ asset('images/logo.svg') }}" alt="logo">
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{ session('error') }}
                        </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    <form class="pt-3" action="{{ route('login.auth') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                type="submit">
                                SIGN IN
                            </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Don't have an account? <a href="{{ route('register.index') }}" class="text-primary">Create</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
