@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-md-12" >
       <a href="{{URL::to('/add_category')}}" class="btn btn-success float-right" >+ ADD</a>
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
                              <th scope="col">Create_At</th>
                              <th scope="col">Action</th>
                           </tr>
                       </thead>
                        <tbody>
                            @foreach($categories as  $category)
                            <tr>
                              <th >{{$category->id}}</th>
                              <td>{{$category->name}}</td>
                              <td>{{$category->created_at}}</td>
                              <td>
                              <button class='btn btn-success btn-sm edit btn-flat'  ><i class='fa fa-edit'></i> <a  href="{{URL::to('/edit-category/'.$category->id)}}" >Edit</a></button>
                              <button  class='btn btn-danger btn-sm delete btn-flat' ><i class='fa fa-trash'></i><a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-category/'.$category->id)}}"> Delete</a></button>
                              </td>
                         </tr>
                     @endforeach
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center">{{$categories->links()}}</div>

          </div>
          
     </section>
     </div>
</div>
@endsection