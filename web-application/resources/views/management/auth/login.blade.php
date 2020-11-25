@extends('management.layouts.empty')

@section('body')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-sm-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="{{ asset('front/images/ds-logo.png') }}" style="height: 25px;" class="mb-5" alt="">
                                    <h1 class="h4 text-gray-900 mb-2">Welkom terug!</h1>
                                    <p class="mb-4">Log hier in om in het beheerportaal van Project TRASH te komen</p>
                                </div>

                                <form class="user " method="POST" action="{{ route('management.auth.login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : null }}"
                                            id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                            placeholder="E-mailadres">

                                        @if($errors->has('email'))
                                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : null }}" name="password"
                                            id="exampleInputPassword" placeholder="Wachtwoord">

                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                                            <label class="custom-control-label" for="customCheck">Onthoud mij</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Inloggen
                                    </button>

                                    {{-- <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> --}}
                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Wachtwoord vergeten?</a>
                                </div>
                                {{-- <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
@endsection
