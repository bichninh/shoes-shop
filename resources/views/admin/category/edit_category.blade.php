@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input id="name" type="text" class=" form-control @error('name') is-invalid @enderror" placeholder="NAME" name="name" required autocomplete="name">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                                   <!-- <input type="text" class="form-control" id="name" placeholder="name"> -->
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Thư mục con</label>
                                    <input id="category_id" type="text" class=" form-control @error('category_id') is-invalid @enderror" placeholder="THU MUC" name="category_id" required autocomplete="category_id">
                                    @error('password')
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
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection