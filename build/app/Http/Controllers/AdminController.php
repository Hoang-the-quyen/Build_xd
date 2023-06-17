<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
     public function filter_by_date(Request $request){
        $data  = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        foreach ($get as $key => $val) {
            $chart_data[] = array(
                'period' =>$val->order_date,
                'order' =>$val->total_order,
                'sales' =>$val->sales,
                'profit' =>$val->profit,
                'quantity' =>$val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
     }

}
