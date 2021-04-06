@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Chỉnh sửa sản phẩm
                        </header>
                        <div class="panel-body">
                        @foreach( $edit_product as  $key => $edit)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product/'.$edit->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input id="name" type="text" value="{{$edit->name}} "class=" form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Danh mục</label>
                                    <input id="category_id" type="text" value="{{$edit->category_id}}"  class=" form-control @error('category_id') is-invalid @enderror" placeholder="DANH MUC" name="category_id" required autocomplete="category_id">
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_id">Thương hiệu</label>
                                    <input id="brand_id" type="text" value="{{$edit->brand_id}}  "class=" form-control @error('brand_id') is-invalid @enderror" placeholder="THƯƠNG HIỆU" name="brand_id" required autocomplete="brand_id">
                                    @error('brand_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="size_id">Size</label>
                                    <input id="size_id" type="text" value="{{$edit->size_id}} " class=" form-control @error('size_id') is-invalid @enderror" placeholder="SIZE" name="size_id" required autocomplete="size_id">
                                    @error('size_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="color_id">Màu sắc</label>
                                    <input id="color_id" type="text" value="{{$edit->color_id}} " class=" form-control @error('color_id') is-invalid @enderror" placeholder="MÀU" name="color_id" required autocomplete="color_id">
                                    @error('color_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="image" type="file"  value="{{$edit->image}} " class=" form-control @error('image') is-invalid @enderror" placeholder="ẢNH" name="image" required autocomplete="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá thành</label>
                                    <input id="price" type="text" value="{{$edit->price}}"   class=" form-control @error('price') is-invalid @enderror" placeholder="GIÁ" name="price" required autocomplete="price">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price_new">Giá mới</label>
                                    <input id="price_new" type="text" value="{{$edit->price_new}} " class=" form-control @error('price_new') is-invalid @enderror" placeholder="GIÁ NEW" name="price_new" required autocomplete="price_new">
                                    @error('price_new')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantily">Số lượng</label>
                                    <input id="quantily" type="text" value="{{$edit->quantily}} "  class=" form-control @error('quantily') is-invalid @enderror" placeholder="SỐ LƯỢNG" name="quantily" required autocomplete="quantily">
                                    @error('quantily')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div><div class="form-group">
                                    <label for="content">Mô tả sản phẩm</label>
                                    <input id="content" type="text" value="{{$edit->content}}" class=" form-control @error('content') is-invalid @enderror" placeholder="MÔ TẢ" name="content" required autocomplete="content">
                                    @error('content')
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