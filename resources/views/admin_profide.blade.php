@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa thông tin cá nhân
                        </header>
                        <div class="panel-body">
                       @foreach($edit_admin as $key =>$edit)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-profide/'.$edit->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="username">UserName</label>
                                    <input id="username" type="text"  value="{{$edit->username}}" class=" form-control @error('username') is-invalid @enderror"  name="username" required autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" value="{{$edit->email}}" class=" form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="text"  value="{{$edit->password}}" class=" form-control @error('password') is-invalid @enderror"  name="password" required autocomplete="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" value="{{$edit->phone}}" class=" form-control @error('phone') is-invalid @enderror"  name="phone" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                               
                               
                               
                              
                               
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">Add</button>
                                @if (session('message'))
                            <div class="alert alert-success">
                               <p>{{ session('message') }}</p>
                             </div>
                               @endif
                            </form>
                            </div>
                        @endforeach
                        </div>
                    </section>

            </div>
@endsection