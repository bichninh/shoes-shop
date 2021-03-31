@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Xóa danh muc sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                    <form role="form"  >
                                <h5>Bạn có muốn xóa danh mục này không?</h5>
                                
                                <div>
                                </div>
                                <button type="submit" class="btn btn-info"><a href="{{URL('/delete')}}"  >YES</a></button>
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