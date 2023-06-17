<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();
class ManagementOrderController extends Controller
{
    public function management_order(Request $request){

       $view_order = DB::table('tbl_order')
       ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')//->where('tbl_customer.customer_id','=',5)
       ->orderBy('order_id','desc')->get();

        return view('admin.order.management_order')->with('view_order',$view_order);
    }

    public function management_order_detail($order_id){

        $view_order_customer = DB::table('tbl_order_detail')
        ->join('tbl_shipping','tbl_order_detail.shipping_id','=','tbl_shipping.shipping_id')->take(1)->get();

        $view_order_detail = DB::table('tbl_order_detail')
        ->join('tbl_product','tbl_order_detail.product_id','=','tbl_product.product_id')
        ->join('tbl_order','tbl_order_detail.order_id','=','tbl_order.order_id')
        ->where('tbl_order_detail.order_id',$order_id)->get();
        return view('admin.order.management_order_detail')->with('view_order_customer',$view_order_customer)->with('view_order_detail',$view_order_detail);
    }
    public function state_change($order_id){
        DB::table('tbl_order')->where('order_id',$order_id)->update(['order_status'=>'Đơn hàng đang vận chuyển']);
        return Redirect()->back();
    }


     public function history_cart($customer_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->where('supplier_status','1')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->where('product_status','1')->take(8)->inRandomOrder()->get();

        $order = DB::table('tbl_order')->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->where('tbl_customer.customer_id','=',$customer_id)->get();

        $cate_p = DB::table('tbl_category_product')->take(4)->get();
        $view_order = DB::table('tbl_order')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        ->join('tbl_product','tbl_order_detail.product_id','=','tbl_product.product_id')
        ->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
        ->where('tbl_customer.customer_id','=',$customer_id)->get();
        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.cart.history')->with('pro_product',$pro_product)->with('cate_product',$cate_product)->with('view_order',$view_order)
        ->with('sup_product',$sup_product)->with('cate_p',$cate_p)->with('order',$order);


     }
     public function chitietdonhang($order_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->where('supplier_status','1')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->where('product_status','1')->take(8)->inRandomOrder()->get();


        $cate_p = DB::table('tbl_category_product')->take(4)->get();

        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }
        $view_order_customer = DB::table('tbl_order_detail')
        ->join('tbl_shipping','tbl_order_detail.shipping_id','=','tbl_shipping.shipping_id')->take(1)->get();

        $view_order_detail = DB::table('tbl_order_detail')
        ->join('tbl_product','tbl_order_detail.product_id','=','tbl_product.product_id')
        ->join('tbl_order','tbl_order_detail.order_id','=','tbl_order.order_id')
        ->where('tbl_order_detail.order_id',$order_id)->get();

        return view('pages.cart.history_detail')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product)->with('cate_p',$cate_p)->with('view_order_customer',$view_order_customer)->with('view_order_detail',$view_order_detail);


     }
}
