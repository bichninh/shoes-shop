@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/store-product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="product_name">Tên sản phẩm</label>
                                    <input id="product_name" type="text" class=" form-control @error('product_name') is-invalid @enderror" placeholder="NAME" name="product_name" required autocomplete="product_name">

                                    @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Danh mục</label>
                                    <select name="category_id" class="form-control input-sm m-bot15"> 
                                    @foreach($cate_product as $key => $cate )
                                    <option value="{{$cate->id}}">{{$cate->name}} </option>
                                    @endforeach
                                    </select>
                                   <!-- <input id="category_id" type="text" class=" form-control @error('category_id') is-invalid @enderror" placeholder="DANH MUC" name="category_id" required autocomplete="category_id"> -->
                                    
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_id">Thương hiệu</label>
                                    <select name="brand_id" class="form-control input-sm m-bot15"> 
                                    @foreach($brand_product as $key => $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}} </option>
                                    @endforeach
                                    </select>
                                   
                                    @error('brand_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="size_id">Size</label>
                                    <select name="size_id" class="form-control input-sm m-bot15"> 
                                    @foreach($size_product as $key => $size)
                                    <option value="{{$size->id}}">{{$size->size_name}} </option>
                                    @endforeach
                                    </select>
                                    @error('size_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="color_id">Màu sắc</label>
                                    <select name="color_id" class="form-control input-sm m-bot15"> 
                                    @foreach($color_product as $key => $color)
                                    <option value="{{$color->id}}">{{$color->color_name}} </option>
                                    @endforeach
                                    </select>
                                    @error('color_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="image" type="file" class=" form-control @error('image') is-invalid @enderror" placeholder="ẢNH" name="image" required autocomplete="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá thành</label>
                                    <input id="price" type="text" class=" form-control @error('price') is-invalid @enderror" placeholder="GIÁ" name="price" required autocomplete="price">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price_new">Giá mới</label>
                                    <input id="price_new" type="text" class=" form-control @error('price_new') is-invalid @enderror" placeholder="GIÁ NEW" name="price_new" required autocomplete="price_new">
                                    @error('price_new')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div>
                                <div class="form-group">
                                    <label for="quantily">Số lượng</label>
                                    <input id="quantily" type="text" class=" form-control @error('quantily') is-invalid @enderror" placeholder="SỐ LƯỢNG" name="quantily" required autocomplete="quantily">
                                    @error('quantily')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                </div><div class="form-group">
                                    <label for="content">Mô tả sản phẩm</label>
                                    <input id="content" type="text" class=" form-control @error('content') is-invalid @enderror" placeholder="MÔ TẢ" name="content" required autocomplete="content">
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