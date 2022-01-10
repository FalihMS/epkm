@extends('layouts.app1')
@section('title', 'Add Admin')
@section('content')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header">
                       Add Admin
                   </div>

                   <div class="card-body">

                       @if (session('status'))
                           <div class="alert alert-success" role="alert">
                               {{ session('status') }}
                           </div>
                       @endif

                       <form action={{url('adminRegister')}} method="post">
                           @csrf
                           <div class="form-group row">
                               <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Admin Name')}}</label>

                               <div class="col-md-6">
                                   <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                          placeholder="Ex: Agus Wijaya">

                                   @error('code')
                                       <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror

                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Admin Email') }}</label>

                               <div class="col-md-6">
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                          placeholder="agus.wibowo@binus.ac.id">

                                   @error('email')
                                   <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   @enderror
                               </div>
                           </div>
                           <div class="form-group row">
                               <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Admin Password') }}</label>

                               <div class="col-md-6">
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus minlength="8" placeholder="Min 8 Characters">

                                   @error('password')
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
                   <div class="card-header">Admin List</div>

                   <div class="card-body">
                       <table class="w-100 table" >
                           <tr>
                               <th>Name</th>
                               <th>Email</th>

                           </tr>
                           @if(sizeof($users) == 0)
                               <tr>
                                   <td colspan="3"> There is no data</td>
                               </tr>
                           @else
                               <?php $i = 0?>
                               @foreach($users as $user)
                                   <tr>
                                       <td>{{ $user->name }}</td>
                                       <td>{{ $user->email }}</td>
{{--                                       <td>--}}
{{--                                           <a class="btn btn-success text-white" href="{{ route('detail_lecturer',['id' => $lecturer['id']]) }}">View Detail</a>--}}
{{--                                       </td>--}}
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


