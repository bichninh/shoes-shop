@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
<div class="row">
   
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Liệt kê chi tiết đơn hàng
                        </header>
           <div class="panel-body">
                   <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">STT</th>
                              <th scope="col">Têm sản phẩm</th>
                              <th scope="col">Số lượng</th>
                              <th scope="col">Giá tiền</th>
                              <th scope="col">Size</th>
                              <th scope="col">Màu sắc</th>
                              <th scope="col">Tổng tiền</th>
                           </tr>
                       </thead>
                       
                        <tbody>
                          <?php
                          $i=0;
                          $total=0;
                          ?>
                           @foreach($order_detail as $detail)
                           <?php
                           $i++;
                           $subtotal=$detail->quantily_sale*$detail->price_unit;
                           $total+=$subtotal;
                           ?>
                            <tr>
                              <td>{{$i}}</td>
                              <td>{{$detail->product_name}}</td>
                              <td>{{$detail->quantily_sale}}</td>
                              <td>{{number_format($detail->price_unit, 0,".",",")}}</td>
                              <td>{{$detail->size}}</td>
                              <td>{{$detail->color}}</td>
                              <td>{{number_format($subtotal, 0,".",",")}}</td> 
                         </tr>
                        @endforeach
                        <tr>
                        <td>Thanh toán: {{number_format($total, 0,".",",")}}đ</td>
                        </tr>
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center"></div>

          </div>
          
     </section>
     </div>
</div>
</div>
<br></br>
<div class="table-agile-info">
<div class="row">
   
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Thông tin khách hàng
                        </header>
           <div class="panel-body">
                   <table class="table">
                        <thead>
                           <tr>
                              
                              <th scope="col">Tên khách hàng</th>
                              <th scope="col">Địa chỉ</th>
                              <th scope="col">Phone</th>
                              
                              
                           </tr>
                       </thead>
                        <tbody>
                           
                            <tr>
                              
                              <td>{{$user->username}}</td>
                              <td>{{$user->address}}</td>
                              <td>{{$user->phone}}</td>
                              
                         </tr>
                    
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center"></div>

          </div>
          
     </section>
     </div>
</div>
</div>
<br></br>
<div class="table-agile-info">
<div class="row">
   
   <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông tin vận chuyển
                        </header>
           <div class="panel-body">
                   <table class="table">
                        <thead>
                           <tr>
                              
                              <th scope="col">Tên người khách hàng</th>
                              <th scope="col">Địa chỉ</th>
                              <th scope="col">Phone</th>
                              <th scope="col">Ghi chú</th>
                    
                           </tr>
                       </thead>
                        <tbody>
                           
                            <tr>
                              
                              <td>{{$shipping->shipping_name}}</td>
                              <td>{{$shipping->shipping_address}}</td>
                              <td>{{$shipping->shipping_phone}}</td>
                              <td>{{$shipping->shipping_notes}}</td>
                             
                         </tr>
                    
                   </tbody>
                </table> 
                <div class="d-flex justify-content-center"></div>

          </div>
          
     </section>
     </div>
</div>
</div>
@endsection