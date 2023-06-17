<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
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


        return view('pages.home')->with('pro_product',$pro_product)->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product)->with('pro_pro',$pro_pro)->with('cate_p',$cate_p)->with('pro_pro4',$pro_pro4);

    }

    public function search(Request $request){
        $keyword = $request->keyword_submit;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $sup_product = DB::table('tbl_supplier')->where('supplier_status','1')->orderBy('supplier_id','desc')->get();



        $cate_p = DB::table('tbl_category_product')->take(4)->get();
        foreach ($cate_product as $key => $cate_pro){
            $pro_product_count = DB::table('tbl_product')
                                ->where('product_status','1')
                                ->where('category_id',$cate_pro->category_id)
                                ->where('category_id',$cate_pro->category_id)
                                ->count();
            $cate_pro->product_count = $pro_product_count;
        }


        return view('pages.search')->with('cate_product',$cate_product)
        ->with('sup_product',$sup_product)->with('cate_p',$cate_p)->with('search_product',$search_product);

    }


}
