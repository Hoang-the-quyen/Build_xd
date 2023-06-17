<?php

namespace App\Http\Controllers;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Coupon;
use Illuminate\Http\Request;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{


    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 111);

        $data = array();
        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['qty'] = $quantity;
        $data['price'] = $product_info->product_price;
        $data['weight'] =$product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        // sét thuế
        Cart::setGlobalTax(0);
        return Redirect::to('show_cart');
        // Cart::destroy();
        // echo 'huy thanh cong';
    }

    public function show_cart(){
        return view('pages.cart.cart_detail');

    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('show_cart');

    }



    public function update_cart_quantity_add(Request $request){
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;

        Cart::update($rowId,$quantity +1);
        return Redirect()->back();

    }
    public function update_cart_quantity_minus(Request $request){
        $rowId = $request->rowId_cart;
        $quantity = $request->cart_quantity;

        Cart::update($rowId,$quantity -1);
        return Redirect()->back();

    }

    //cart ajax

    public function delete_cart_ajax($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
        else{
            return Redirect()->back();
        }
    }
    // update quantity
    public function update_qty_ajax_plus($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key =>$item){
                if($item['session_id'] == $session_id){
                    $cart[$key]['product_qty'] ++;
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
        else{
            return Redirect()->back();
        }
    }

    public function update_qty_ajax_minus($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key =>$item){
                if($item['session_id'] == $session_id){
                    if($cart[$key]['product_qty'] > 1){
                        $cart[$key]['product_qty'] --;
                    }
                    else{
                        Session::put('cart',$cart);
                         return Redirect()->back();
                    }
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
        else{
            return Redirect()->back();
        }
    }


    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = session::get('cart');

        if ($cart == true) {
            $product_exists = false;

            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    // Tìm thấy sản phẩm trong giỏ hàng, cập nhật số lượng
                    $cart[$key]['product_qty'] += $data['cart_product_qty'];
                    $product_exists = true;
                    break;
                }
            }

            if (!$product_exists) {
                // Không tìm thấy sản phẩm trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
                $cart[] = [
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_price' => $data['cart_product_price'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                ];
            }
        } else {
            // Giỏ hàng rỗng, thêm sản phẩm mới vào giỏ hàng
            $cart[] = [
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_price' => $data['cart_product_price'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
            ];
        }

        Session::put('cart', $cart);
        Session::save();

    }

    public function gio_hang(){
        Cart::destroy();
        return view('pages.cart.cart_ajax');

    }

    public function check_coupon(Request $request){
        $data = $request->all();
    //     print_r($data);
    //    return Redirect::to('/gio_hang');

        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_vaiable =0;
                    if($is_vaiable ==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_codition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                         }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_codition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return Redirect()->back();
                }

            }else{
                return Redirect()->back();

            }
        }
    public function insert_order(Request $request)
    {
    $data = $request->all();

    // Lưu thông tin vào bảng Shipping
    $shipping = new Shipping();
    $shipping->shipping_name = $data['shipping_name'];
    $shipping->shipping_address = $data['shipping_address'];
    $shipping->shipping_phone = $data['shipping_phone'];
    $shipping->shipping_email = $data['shipping_email'];
    $shipping->save();

    // Lưu thông tin vào bảng Order
    $order = new Order();
    $order->customer_id = $data['customer_id'];
    $order->order_status = 'Đơn hàng mới';
    $order->order_total = $data['order_total'];
    $order->order_time = date('Y-m-d H:i:s');
    $order->save();

    // Lưu thông tin vào bảng Order_detail
    $product_ids = $data['product_ids'];
    $product_quantities = $data['product_quantities'];
    $order_detail_note = $data['order_detail_note'];

    for ($i = 0; $i < count($product_ids); $i++) {
        $order_detail = new Order_detail();
        $order_detail->order_id = $order->order_id; // Gán order_id từ bảng Order
        $order_detail->shipping_id = $shipping->shipping_id; // Gán shipping_id từ bảng Shipping
        $order_detail->product_id = $product_ids[$i];
        $order_detail->product_quantity = $product_quantities[$i];
        $order_detail->order_detail_note = $order_detail_note;
        $order_detail->save();
    }

    }

    public function history_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->where('supplier_status','1')->orderBy('supplier_id','desc')->get();

        $pro_product = DB::table('tbl_product')->where('product_status','1')->take(8)->inRandomOrder()->get();

        $pro_pro = DB::table('tbl_product')->where('product_status','1')->take(4)->inRandomOrder()->get();
        $pro_pro4 = DB::table('tbl_product')->where('product_status','1')->take(3)->inRandomOrder()->get();
        $cate_p = DB::table('tbl_category_product')->take(4)->get();
        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.cart.history')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product)->with('pro_pro',$pro_pro)->with('cate_p',$cate_p)->with('pro_pro4',$pro_pro4);
        // return view('pages.cart.history');
    }



}


