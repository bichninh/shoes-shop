@extends('admin_layout')
@section('admin_content')


<div class="row">
   
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Liệt kê đơn hàng
                        </header>
           <div class="panel-body">
                   <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Tên người đặt</th>
                              <th scope="col">Tổng giá tiền</th>
                              <th scope="col">Tình trạng</th>
                              <th scope="col">Create_At</th>
                              <th scope="col">Hành động</th>
                           </tr>
                       </thead>
                        <tbody>
                            @foreach($all_order as $ord)
                            <tr>
                              <th >{{$ord->order_id}}</th>
                              <td>{{$ord->username}}</td>
                              <td>{{$ord->total}}</td>
                              <td>{{$ord->status}}</td>
                              <td>{{$ord->created_at}}</td>
                              <td>
                              <button class='btn btn-success btn-sm edit btn-flat'  ><i class='fa fa-eye'></i> <a  href="{{URL::to('/view-order/'.$ord->order_id)}}" >View</a></button>
                              <button  class='btn btn-danger btn-sm delete btn-flat' ><i ></i><a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/delete-order/'.$ord->order_id)}}"> Delete</a></button>
                              </td>
                         </tr>
                     @endforeach
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center">{{$all_order ->links()}}</div>

          </div>
          
     </section>
     </div>
</div>
@endsection