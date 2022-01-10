@extends('layouts.app1')
@section('title','Homepage')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block col-10">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="col-md-10">
                <div class="card">

                    <div class="card-header">Create New PKM</div>

                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <form method="POST" action="/pkm">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-10">
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
                                <label for="idLecturer" class="col-md-2 col-form-label text-md-right">{{ __('Lecturer') }}</label>

                                <div class="col-md-10">
                                    <select id="idLecturer" class="form-control @error('idLecturer') is-invalid @enderror" name="idLecturer" value="{{ old('idLecturer') }}" required autocomplete="idLecturer" autofocus>
                                        <option value="0" disabled selected>-- Select Lecturer Type --</option>
                                        @foreach($lecturers as $lecturer)
                                            <option value="{{$lecturer['id']}}"> {{$lecturer['code'].' - '.$lecturer['name']}}</option>
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
                                <label for="class" class="col-md-2 col-form-label text-md-right">{{ __('Class') }}</label>

                                <div class="col-md-10">
                                    <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('Class') }}" required autocomplete="idLecturer" autofocus>
                                        <option value="0" disabled selected>-- Select Class Type --</option>
                                    </select>
                                    @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="member_1_nim" class="col-md-2 col-form-label text-md-right">{{ __('Member NIM 1') }}</label>

                                <div class="col-md-4">
                                    <input id="member_1_nim" type="text" class="form-control @error('member_1_nim') is-invalid @enderror" name="member_1_nim" value="{{ old('member_1_nim') }}" required autocomplete="member_1_nim" autofocus
                                           pattern="[0-9]{10}" placeholder="Ex: 2303847684" maxlength="10">

                                    @error('member_1_nim')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <label for="member_1_nama" class="col-md-2 col-form-label text-md-right">{{ __('Member Name 1') }}</label>

                                <div class="col-md-4">
                                    <input id="member_1_nama" type="text" class="form-control @error('member_1_nama') is-invalid @enderror" name="member_1_nama" value="{{ old('member_1_nama') }}" required autocomplete="member_1_nama" autofocus>

                                    @error('member_1_nama')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="member_2_nim" class="col-md-2 col-form-label text-md-right">{{ __('Member NIM 2') }}</label>

                                <div class="col-md-4">
                                    <input id="member_2_nim" type="text" class="form-control @error('member_2_nim') is-invalid @enderror" name="member_2_nim" value="{{ old('member_2_nim') }}" required autocomplete="member_2_nim" autofocus
                                           pattern="[0-9]{10}" placeholder="Ex: 2303847684" maxlength="10">

                                    @error('member_2_nim')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <label for="member_2_nama" class="col-md-2 col-form-label text-md-right">{{ __('Member Name 2') }}</label>

                                <div class="col-md-4">
                                    <input id="member_2_nama" type="text" class="form-control @error('member_2_nama') is-invalid @enderror" name="member_2_nama" value="{{ old('member_2_nama') }}" required autocomplete="member_2_nama" autofocus>

                                    @error('member_2_nama')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="text" name="idLeader" id="idLeader" value="{{$id}}" style="display:none;">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary px-5">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $("#idLecturer")
                .change(function () {
                    var id = $(this).children("option:selected").val();
                    if(id  != 0 ){
                        jQuery.ajax({
                            url : 'pkm/class/' + id,
                            type : "GET",
                            dataType : "json",
                            success:function(data)
                            {
                                jQuery('select[name="class"]').empty();
                                for (var i = 0; i< data.length;i++){
                                    var lecturer = data[i];
                                    $('select[name="class"]').append('<option value="'+ lecturer['class'] +'">'+ lecturer['class'] +'</option>');
                                }
                            }
                        });
                    }else{
                        jQuery('select[name="subtest"]').empty();
                        $('select[name="subtest"]').append('<option value="0">---</option>');
                    }
                });
        });
    </script>
@endsection
