@extends('layouts.app1')
@section('title', 'Admin View')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View All PKMs</div>

                    <div class="card-body">
                        <table class="w-100 table" >
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Class</th>
                                <th>Lecturer</th>
                                <th>Action</th>
                            </tr>
                            @if(sizeof($pkms) == 0)
                                <tr>
                                    <td colspan="3"> There is no data</td>
                                </tr>
                            @else
                                <?php $i = 1?>
                                @foreach($pkms as $pkm)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pkm['title'] }}</td>
                                        <td>{{ $pkm['class'] }}</td>
                                        <td>{{ $pkm->lecturer->name }}</td>`
                                        <td><a href="{{ route('download',['id'=>$pkm['id']]) }}">Download File</a></td>
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
