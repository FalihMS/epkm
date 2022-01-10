@extends('layouts.app1')
@section('title','Upload PKM')
@section('script')
    <script>
        // function fileValidation(){
        //     var fileInput = document.getElementById('file');
        //     var filePath = fileInput.value;
        //     var allowedExtensions = /(\.doc|\.docx)$/i;
        //     if(!allowedExtensions.exec(filePath)) {
        //         alert('Please upload file having extensions .doc and .docx only.');
        //         fileInput.value = '';
        //         return false;
        //     }
        //
        //     var fi = document.getElementById('file'); // GET THE FILE INPUT.
        //
        //     // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        //     if (fi.files.length > 0) {
        //         // RUN A LOOP TO CHECK EACH SELECTED FILE.
        //         for (var i = 0; i <= fi.files.length - 1; i++) {
        //
        //             var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
        //             var fsize_real = Math.round((fsize / 1024));
        //
        //             if(fsize_real >= 5120){
        //                 alert("File Size too Big");
        //                 return false;
        //             }
        //         }
        //     }
        // }

    </script>
@endsection
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

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">Uploads Detail</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 text-right">Session :</div>
                        <div class="col-8">{{ $session['session'] }}</div>
                    </div>
                    <div class="row">
                        <div class="col-4 text-right">Deadline :</div>
                        <div class="col-8">{{ $session['deadline'] }}</div>
                    </div>
                    <form action="{{url('upload')}}" method="post" enctype="multipart/form-data"
                           onsubmit="return fileValidation()" >
                        <div class="row">
                            <div class="col-4 text-right">Upload File</div>
                                @csrf
                                <div class="col-8">
                                        <input type="text" name="idPkm" id="idPkm" value="{{$pkm->id}}" hidden>
                                        <input type="text" name="session_id" id="session_id" value="{{$session->id}}" hidden>
                                        <input type="file" name="file" id="file" required>
                                </div>
                        </div>
                        <div class="text-danger">Notes:</div>
                        <div class="row">
                            <ul>
                                <li class="list-item text-danger border-0"> PKM yang diupload adalah PKM yang sudah Final dan sudah direvisi</li>
                                <li class="list-item text-danger border-0"> Extension File harus menggunakan .doc atau .docx</li>
                                <li class="list-item text-danger border-0"> Maximal dari ukuran file adalah 5 MB</li>
                                <li class="list-item text-danger border-0"> Pastikan Detail PKM yang ditampilkan sudah sesuai</li>
                                <li class="list-item text-danger border-0"> MAHASISWA HANYA DAPAT MENGUNGGAH 1X</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col text-left mt-3 text-center">
                                <button type="submit" class="btn btn-primary px-5">
                                    {{ __('Submit') }}
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
