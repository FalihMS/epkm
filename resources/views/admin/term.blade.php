@extends('layouts.app1')

@section('title', 'Admin Term')

@section('script')
<script>


{{--    // $(document).ready(function () {--}}
{{--    //--}}
{{--    //     $("#academic_year1").keyup(function () {--}}
{{--    //         if (document.getElementById('academic_year1')) {--}}
{{--    //             var year1 = document.getElementById('academic_year1').value;--}}
{{--    //             year1 ++;--}}
{{--    //             document.getElementById('academic_year2').value = year1;--}}
{{--    //         }--}}
{{--    //     })--}}
{{--    // });--}}

{{--    function validateForm() {--}}
{{--        var g1 = new Date(document.getElementById('begin').value);--}}
{{--        var g2 = new Date(document.getElementById('ending').value);--}}
{{--        if (g1 === g2) {--}}
{{--            alert("Begin date and Ending date must not be equal");--}}
{{--            return false--}}
{{--        }--}}
{{--        else if (g1 > g2) {--}}
{{--            alert("Ending date must not be earlier than Begin date");--}}
{{--            return false--}}
{{--        }--}}

{{--        var year1 = document.getElementById('academic_year1').value;--}}
{{--        var year2 = document.getElementById('academic_year2').value;--}}

{{--        if(year1 > year2){--}}
{{--            alert('Term first year must be earlier than second year');--}}
{{--            return false;--}}
{{--        }else if(year1 === year2){--}}
{{--            alert('Term first year must be earlier than second year');--}}
{{--            return false;--}}
{{--        }--}}

{{--        if (year2 != g2.getFullYear()  && year1 != g1.getFullYear()){--}}
{{--            console.log('yes');--}}
{{--            alert('Term year must match date year');--}}
{{--            return false;--}}
{{--        }--}}
{{--    }--}}
$(document).ready(function () {
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('.modal-body input').val(recipient)
    })
})
</script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Term</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ url('term') }}" method="POST" >
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Term name') }}</label>

                                <div class="col-md-2">
                                    <input id="academic_year1" type="number" class="form-control @error('academic_year1') is-invalid @enderror" name="academic_year1"  required autofocus
                                     placeholder="2020" min="2019">

                                    @error('academic_year1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class=""><h3>/</h3></div>
                                <div class="col-md-2">
                                    <input id="academic_year2" type="number" class="form-control @error('academic_year2') is-invalid @enderror" name="academic_year2"  required autofocus
                                           placeholder="2021">

                                    @error('academic_year1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @error('academic_year2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester" class="col-md-4 col-form-label text-md-right">{{ __('Semester') }}</label>

                                <div class="col-md-6">

                                    <select name="semester" id="semester" class="form-control" required>
                                        <option selected>Genap</option>
                                        <option>Ganjil</option>
                                    </select>
                                </div>

                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="begin" class="col-md-4 col-form-label text-md-right">{{ __('Begin') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="begin" type="date" class="form-control @error('begin') is-invalid @enderror" name="begin" required autofocus>--}}

{{--                                    @error('begin')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="ending" class="col-md-4 col-form-label text-md-right">{{ __('Ending') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="ending" type="date" class="form-control @error('ending') is-invalid @enderror" name="ending" required autofocus>--}}

{{--                                    @error('ending')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
                    <div class="card-header">Term List</div>

                    <div class="card-body">
                        <table class="w-100 table" >
                            <tr>
                                <th>Name</th>
                                <th>Semester</th>
                                <th>Active</th>
                            </tr>
                            @if(sizeof($term) == 0)
                                <tr>
                                    <td colspan="3"> There is no data</td>
                                </tr>
                            @else
                                <?php $i = 0?>
                                @foreach($term as $term)
                                    <tr>
                                        <td>{{ $term['academic_year'] }}</td>
                                        <td>{{ $term['semester'] }}</td>
                                        <td>{{ $term['status'] }}</td>
                                        @if($term['status'] == 'active')
                                            <td>
                                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#editModal"
                                                        data-whatever={{$term['id']}}>Deactived</button>
                                            </td>
                                        @elseif($term['status'] == 'inactive')
                                            <td>
                                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#editModal"
                                                        data-whatever={{$term['id']}}>Activated</button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </table>

{{--                        untuk verifikasi mau activated atau inactive--}}
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Verification</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{url('term/status')}}" >
                                        @csrf
                                        <div class="modal-body">
                                                <div class="align-content-center">
                                                    <h3>Proceed?</h3>
                                                </div>
                                            <input type="text" class="form-control" id="recipient-name" name="id" hidden>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary" value="submit">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
