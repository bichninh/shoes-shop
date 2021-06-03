<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\shipping;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class OrderController extends Controller
{
    public function manage_order(){
        $all_order=DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->select('orders.*','users.username')
        ->orderby('orders.order_id','desc')->paginate(5);
        $manage_order= view('admin.order.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.order.manage_order',$manage_order);
       // $order=order::orderby('order_id','desc')->get();
       // return view('admin.order.manage_order')->with(compact($order));
    }
    public function view_order($order_id){
        /*$order_by_id= DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('shippings','orders.shipping_id','=','shippings.id')
        ->join('order_details','orders.order_id','=','order_details.order_id')
        ->select('orders.*','users.*','shippings.*','order_details.*')->first();
       
        $manage_by_order= view('admin.order.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.order.view_order',$manage_by_order);*/
        $order_detail= order_detail::where('order_id',$order_id)->get();
        $order= order::where('order_id',$order_id)->get();
        foreach($order as $ord){
            $user_id= $ord->user_id;
            $shipping_id= $ord->shipping_id;
          }
        $user= User::where('id',$user_id)->first();
        $shipping = shipping::where('id',$shipping_id)->first();
        $order_detail= order_detail::with('product')->where('order_id',$order_id)->get();
        return view('admin.order.view_order')->with(compact('order_detail','user','shipping','order_detail'));
    }
    public function delete_order($order_id){
        DB::table('orders')->where('order_id', $order_id)->delete();
        return redirect()->back()->with('message', "Xóa đơn hàng thành công ");

    }
}
