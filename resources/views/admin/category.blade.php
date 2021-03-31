@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-md-12" >
       <a href="" class="btn btn-success float-right m-2">+ ADD</a>
    </div>
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                        <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              
                              <th scope="col">Action</th>
                           </tr>
                       </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                              <th >{{$category->id}}</th>
                              <td>{{$category->name}}</td>
                              <td>
                              <button class='btn btn-success btn-sm edit btn-flat' ><i class='fa fa-edit'></i> Edit</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' ><i class='fa fa-trash'></i> Delete</button>
                              </td>
                         </tr>
                     @endforeach
                   </tbody>
        </table> 

          </div>
          
</section>
</div>

@endsection