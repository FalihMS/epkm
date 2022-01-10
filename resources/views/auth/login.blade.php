@extends('layouts.app1')
@section('title', 'Pengumpulan PKM - Login Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col xs-12 center_div">

                        <form method="POST" action="{{ route('login') }}" class="form-container">
                            @csrf
                            <h2 class="a">Log-In</h2>
                            <div class="form-group">
                                <label for="email"> {{ __('E-Mail Address') }} </label>

                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>


                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror


                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember"--}}
{{--                                               id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group">
{{--                                <div class="col-md-8 offset-md-4">--}}
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Login') }}
                                    </button>

                                <small>Don't have an account?<a href="{{route('register')}}">Sign Up</a></small>
{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
                            </div>
                        </form>

            </div>
        </div>
    </div>
@endsection
