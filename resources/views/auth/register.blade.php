@extends('template.auth')

@section('content')
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <img src="../../images/logo.svg" alt="logo">
                    </div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                    <form class="pt-3" action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" id="name" name="name"
                                placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                SIGN UP
                            </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Already have an account? <a href="{{ route('login.index') }}" class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
