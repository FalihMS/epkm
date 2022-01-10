@extends('layouts.app1')
@section('title', 'Admin Session')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Session</div>

                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong> {{ $message }} </strong>
                            </div>
                        @elseif($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @elseif($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Please check the form below for errors
                            </div>
                        @endif
                            <form action="{{ url('session') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Session name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="idTerm" class="col-md-4 col-form-label text-md-right">{{ __('Term') }}</label>

                                    <div class="col-md-6">
                                        <select id="idTerm" class="form-control @error('idTerm') is-invalid @enderror" name="idTerm" value="{{ old('idTerm') }}" required autocomplete="idTerm" autofocus>
                                            <option value="0" disabled selected>-- Select Term --</option>
                                            @foreach($terms as $term)
                                                <option value="{{$term['id']}}"> {{$term['academic_year'].' - '.$term['semester']}}</option>
                                            @endforeach
                                        </select>
                                        @error('idLecturer')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
                                            <option value="0" disabled selected>-- Select PKM Type --</option>
                                            <option value="PKM KC">PKM Karsa Cipta</option>
                                            <option value="PKM GT">PKM Gagasan Tertulis</option>
                                            <option value="PKM GFK">PKM Gagasan Futuristik Konstruktif</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                                    <div class="col-md-6">
                                        <input id="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}" required autocomplete="deadline" autofocus>

                                        @error('deadline')
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
                    <div class="card-header">Session List</div>

                    <div class="card-body">
                        <table class="w-100 table" >
                            <tr>
                                <th>Session</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                            @if(sizeof($sessions) == 0)
                                <tr>
                                    <td colspan="3"> There is no data</td>
                                </tr>
                            @else
                                <?php $i = 0?>
                                @foreach($sessions as $session)
                                    <tr>
                                        <td>{{ $session['session'] }}</td>
                                        <td>{{ $session['deadline'] }}</td>
                                        <td>
                                            <a class="btn btn-success text-white" href="{{ route('detail_session',['id' => $session['id']]) }}">View Detail</a>
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
