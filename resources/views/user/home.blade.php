@extends('layouts.app1')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PKM Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-4 text-right">Pkm Title :</div>
                            <div class="col-8">{{ $pkm['title'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-right">Pkm Type :</div>
                            <div class="col-8">{{ $pkm['type'] }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-right">Lecturer :</div>
                            <div class="col-8">{{ strtoupper($pkm->lecturer->code . ' - ' .  $pkm->lecturer->name) }}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-right">Class :</div>
                            <div class="col-8">{{ $pkm->class}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-right">Member 1 :</div>
                            <div class="col-8">{{ $pkm->member_1_nim . ' - '. $pkm->member_1_nama}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-right">Member 2 :</div>
                            <div class="col-8">{{ $pkm->member_2_nim . ' - '. $pkm->member_2_nama}}</div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">PKM Lists</div>
                <div class="card-body">
                    <table class="w-100 table" >
                        <tr>
                            <th>No.</th>
                            <th>Session</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                        @if(sizeof($sessions) == 0)
                            <td colspan="4"><p class="font-weight-bold text-center">There Is No Data</p></td>
                        @else

                            @foreach($sessions as $session)
                                <tr>
                                    <td>{{ $session['id'] }}</td>
                                    <td>{{ $session['session'] }}</td>
                                    <td>{{ $session['deadline'] }}</td>
                                    <td><a href="{{url('/upload',['id'=>$session['id']])}}">Upload File</a></td>
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
