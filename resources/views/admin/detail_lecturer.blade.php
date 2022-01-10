@extends('layouts.app1')
@section('title', 'Detail Lecturer')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lecturer Information</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form>
                                @csrf
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Lecturer Code') }}</label>

                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $lecturer['code'] }}" required autocomplete="code" autofocus>

                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lecturer Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $lecturer['name'] }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Lecturer List</div>

                    <div class="card-body">
                        <table class="w-100 table" >
                            <tr>
                                <th>No.</th>
                                <th>class</th>
                                <th>Action</th>
                            </tr>
                            @if(sizeof($classes) == 0)
                                <tr>
                                    <td colspan="3"> There is no data</td>
                                </tr>
                            @else
                                <?php $i = 1?>
                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $class['class'] }}</td>

                                    </tr>
                                @endforeach
                            @endif
                        </table>
                        <a href="{{ route('add_class',['id'=> $lecturer['id']]) }}" class="btn btn-outline-primary">Add new</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
