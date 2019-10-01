@extends('layouts.app')

@section('content')


    <style>
        .box {
            margin-top: 2em;
            margin-left: 26em;
        }

        .login {
            width: 16.9em;
            border-radius: 22px;
            margin-left: -211px;
        }

        @media only screen and (max-device-width: 1024px) {
            .box {
                margin-top: 2em;
                margin-left: 20em;
            }

            .login {
                width: 16.9em;
                border-radius: 22px;
                margin-left: -211px;
            }
        }

        @media only screen and (max-device-width: 768px) {
            .box {
                margin-top: 2em;
                margin-left: 7em;
            }

            .box input {
                width: 20em;
            }

            .login {
                width: 16.9em;
                border-radius: 22px;
                margin-left: -137px;
            }
        }

        @media only screen and (max-device-width: 425px) {
            .box {
                margin-top: 2em;
                margin-left: 2.5em;
            }

            .box input {
                width: 20em;
            }

            .login {
                width: 15em;
                border-radius: 22px;
                margin-left: 38px;
            }
        }

        @media only screen and (max-device-width: 375px) {
            .box {
                margin-top: 2em;
                margin-left: 2.5em;
            }

            .box input {
                width: 16em;
            }

            .login {
                width: 15em;
                border-radius: 22px;
                margin-left: 10px;
            }
        }

        @media only screen and (max-device-width: 320px) {
            .box {
                margin-top: 2em;
                margin-left: 1em;
            }

            .box input {
                width: 16em;
            }

            .login {
                width: 15em;
                border-radius: 22px;
                margin-left: 8px;
            }
        }
    </style>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 box">

            <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-md-6">
                                <label for="name" class="text-muted small">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email"
                                       class="text-muted small text-center">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="DepartmentID" class="text-muted small">{{ __('DepartmentID') }}</label>
                                    <input id="DepartmentID" type="text" class="form-control @error('DepartmentID') is-invalid @enderror" name="DepartmentID" autofocus>
    
                                    @error('DepartmentID')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="FacultyID" class="text-muted small">{{ __('FacultyID') }}</label>
                                        <input id="FacultyID" type="text" class="form-control @error('FacultyID') is-invalid @enderror" name="FacultyID" autofocus>
        
                                        @error('FacultyID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="text-muted small">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password-confirm"
                                       class="text-muted small">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary login">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
