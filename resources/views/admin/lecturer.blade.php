@extends('layouts.app1')
@section('title', 'Admin Add Lecturer')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Lecturer</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <form action="{{ url('lecturer') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Lecturer Code') }}</label>

                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus
                                               pattern="D[0-9]{4}" placeholder="Ex: D1234" maxlength="5" MINLENGTH="5">

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
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                            {{ __('Add New') }}
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
                                <th>Code</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            @if(sizeof($lecturers) == 0)
                                <tr>
                                    <td colspan="3"> There is no data</td>
                                </tr>
                            @else
                                <?php $i = 0?>
                                @foreach($lecturers as $lecturer)
                                    <tr>
                                        <td>{{ $lecturer['code'] }}</td>
                                        <td>{{ $lecturer['name'] }}</td>
                                        <td>
                                            <a class="btn btn-success text-white" href="{{ route('detail_lecturer',['id' => $lecturer['id']]) }}">View Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
