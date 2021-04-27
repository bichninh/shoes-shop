@extends('admin_layout')
@section('admin_content')


<div class="row">
    <div class="col-md-12" >
       <a href="{{URL::to('/add_product')}}" class="btn btn-success float-right" >+ ADD</a>
    </div>
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                             Danh sách sản phẩm
                        </header>
           <div class="panel-body">
                   <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Category</th>
                              <th scope="col">Brand</th>
                              <th scope="col">Size</th>
                              <th scope="col">Color</th>
                              <th scope="col">Image</th>
                              <th scope="col">Price</th>
                              <th scope="col">Price_new</th>
                              <th scope="col">Quantily</th>
                              <th scope="col">Content</th>
                              <th scope="col">Create_At</th>
                              <th scope="col">Action</th>
                           </tr>
                       </thead>
                        <tbody>
                     
                         
                            @foreach($products as  $product)
                           
                            <tr>
                              <th >{{$product->product_id}}</th>
                              <td>{{$product->product_name}}</td>
                              <td>{{$product->name}}</td>
                              <td>{{$product->brand_name}}</td>
                              <td>{{$product->size_name}}</td>
                              <td>{{$product->color_name}}</td>
                              <td><img src="{{asset('public/uploads/product/'.$product->image)}}" class="img-responsive" width="100px" alt="">{{$product->image}}</td>
                              
                              <td>{{$product->price}}</td>
                              <td>{{$product->price_new}}</td>
                              <td>{{$product->quantily}}</td>
                              <td>{{$product->content}}</td>
                              <td>{{$product->created_at}}</td>
                              <td>
                              <button class='btn btn-success btn-sm edit btn-flat' ><i class='fa fa-edit'></i> <a  href="{{URL::to('/edit-product/'.$product->product_id)}}" >Edit</a></button>
                              <button  class='btn btn-danger btn-sm delete btn-flat' ><i class='fa fa-trash'></i><a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-product/'.$product->product_id)}}"> Delete</a></button>
                              </td>
                         </tr>
                     @endforeach
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center">{{$products ->links()}}</div>

          </div>
          
     </section>
     </div>
</div>
@endsection