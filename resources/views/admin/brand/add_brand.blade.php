@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/store-brand')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="brand_name">Tên thương hiệu</label>
                                    <input id="brand_name" type="text" class=" form-control @error('brand_name') is-invalid @enderror" placeholder="NAME" name="brand_name" required autocomplete="brand_name">

                                    @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
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