@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm người dùng
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/store-user')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="username">UserName</label>
                                    <input id="username" type="text" class=" form-control @error('username') is-invalid @enderror" placeholder="USERNAME" name="username" required autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" placeholder="EMAIL" name="email" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="text" class=" form-control @error('password') is-invalid @enderror" placeholder="PASS" name="password" required autocomplete="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class=" form-control @error('phone') is-invalid @enderror" placeholder="PHONE" name="phone" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class=" form-control @error('address') is-invalid @enderror" placeholder="ADDRESS" name="address" required autocomplete="address">
                                    @error('address')
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

                        </div>
                    </section>

            </div>
@endsection