@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach( $edit_category as  $key => $edit)
                            <div class="pos ition-center">
                                <form role="form" action="{{ URL::to('/update-category/'.$edit->id)}}" method="post">
                                {{ csrf_field() }}  
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input id="name" type="text" value="{{ $edit->name }}" class=" form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Thư mục cha</label>
                                    <input id="category_id" type="text" value="{{ $edit->category_id }}" class=" form-control @error('category_id') is-invalid @enderror"   name="category_id" required autocomplete="category_id">
                                    @error('category_id')
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
                                <button type="submit" class="btn btn-info">Update</button>
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