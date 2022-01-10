@extends('layouts.app1')
@section('title', 'Pengumpulan PKM - Register Page')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 center_div">

                <form method="POST" action="{{ route('register') }}" class="form-container">
                    @csrf
                    <h2 class="a">Register</h2>
                    <div class="form-group">
                        <label for="nim">Nomor Induk Mahasiswa</label>

                        <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror"
                               name="nim" value="{{ old('nim') }}" required autocomplete="nim" autofocus
                               pattern="[0-9]{10}" placeholder="Ex: 2303847684" maxlength="10">

                        @error('nim')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>


                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder="Ex: Dimas wibowo">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="kevin@binus.ac.id">

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
                               required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn -block">
                            {{ __('Register') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
