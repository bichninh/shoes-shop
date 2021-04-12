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
                                    <label for="product_name">Tên sản phẩm</label>
                                    <input id="product_name" type="text" value="{{$edit->product_name}} "class=" form-control @error('product_name') is-invalid @enderror" name="product_name" required autocomplete="product_name">

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
                                    @if($cate->id== $edit->category_id)
                                    <option selected value="{{$cate->id}}">{{$cate->name}} </option>
                                    @else
                                    <option value="{{$cate->id}}">{{$cate->name}} </option>
                                    @endif
                                    @endforeach
                                    </select>
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
                                    @if($brand->brand_id== $edit->brand_id)
                                    <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}} </option>
                                    @else
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}} </option>
                                    @endif
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
                                    @if($size->id== $edit->size_id)
                                    <option selected value="{{$size->id}}">{{$size->size_name}} </option>
                                    @else
                                    <option value="{{$size->id}}">{{$size->size_name}} </option>
                                    @endif
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
                                    @if($color->id == $edit->color_id)
                                    <option selected value="{{$color->id}}">{{$color->color_name}} </option>
                                    @else
                                    <option value="{{$color->id}}">{{$color->color_name}} </option>
                                    @endif
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