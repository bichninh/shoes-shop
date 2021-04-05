@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-md-12" >
       <a href="{{URL::to('/add_brand')}}" class="btn btn-success float-right" >+ ADD</a>
    </div>
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thương hiệu sản phẩm
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
                            @foreach($brands as  $brand)
                            <tr>
                              <th >{{$brand->brand_id}}</th>
                              <td>{{$brand->brand_name}}</td>
                              <td>{{$brand->created_at}}</td>
                              <td>
                              <button class='btn btn-success btn-sm edit btn-flat' ><i class='fa fa-edit'></i> <a  href="{{URL::to('/edit-brand/'.$brand->brand_id)}}" >Edit</a></button>
                              <button  class='btn btn-danger btn-sm delete btn-flat' ><i class='fa fa-trash'></i><a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-brand/'.$category->brand_id)}}"> Delete</a></button>
                              </td>
                         </tr>
                     @endforeach
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center">{{$brands->links()}}</div>

          </div>
          
     </section>
     </div>
</div>
@endsection