@extends('layouts.app')

@section('content')
    <style>
        .box {
            margin-top: 14em;
            margin-left: 9em;
        }

        .login {
            width: 25.9em;
            border-radius: 22px;
        }

        .shift {
            margin-left: 30px;
        }

        @media only screen and (max-device-width: 1024px) {
            .box {
                margin-top: 11em;
                margin-left: 7em;
            }

            .login {
                width: 20.9em;
                border-radius: 22px;
            }

        }

        @media only screen and (max-device-width: 768px) {
            .box {
                margin-top: 9em;
                margin-left: auto;
            }

            .login {
                width: 23.9em;
                border-radius: 22px;
            }

        }

        @media only screen and (max-device-width: 425px) {
            .box {
                margin-top: 9em;
                margin-left: auto;
            }

            .login {
                width: 20em;
                border-radius: 22px;
            }

            .shift {
                margin-left: 87px;
            }
        }

        @media only screen and (max-device-width: 375px) {
            .box {
                margin-top: 9em;
                margin-left: auto;
            }

            .login {
                width: 17.5em;
                border-radius: 22px;
            }

            .shift {
                margin-left: 60px;
            }
        }

        @media only screen and (max-device-width: 320px) {
            .box {
                margin-top: 4em;
                margin-left: auto;
            }

            .login {
                width: 14.5em;
                border-radius: 22px;
            }

            .shift {
                margin-left: 39px;
            }
        }

        .blurbg {
            opacity: 0.6;
            object-fit: contain;
        }
    </style>


    <div class="box middle">


        <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-lg-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email"
                                       placeholder="Email Address" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-lg-9">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="Enter Your Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-9 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label small" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary login">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="form-group row mb-0 shift">


                            @if (Route::has('password.request'))
                                <a class="btn btn-link small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                </a>
                                <a class="btn btn-link small" href="{{ route('register') }}">New ? Create Account
                                </a>
                                @endif

                        </div>

                    </form>
                </div>
        </div>
        </div>
</div>
@endsection
