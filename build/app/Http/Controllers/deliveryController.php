<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;

class deliveryController extends Controller
{
    public function delivery(){
        $city = City::orderby('matp','ASC')->get();
        return view('admin.delivery.show_delivery')->with(compact('city'));
    }
    public function update_delivery(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }

    public function select_delivery(Request $request){
        $data = $request->all();
        if(isset($data['action'])){
            $output ='';
            if($data['action'] === "city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output.='<option>--chọn quận huyện --</option>';
                foreach($select_province as $key =>$province){
                    $output .='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else if($data['action'] === "province"){
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderBy('xaid','ASC')->get();
                $output.='<option>--chọn xã phường--</option>';
                    foreach($select_wards as $key =>$wards){
                $output .='<option value="'.$wards->xaid.'">'.$wards->name_xaphuong.'</option>';
                }
            }

            echo $output;
        }
    }

    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }

    public function select_feeship(){
        $feeship = Feeship::orderby('fee_id','DESC')->get();
        $output = '';
        $output .='<div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tên thành phố</th>
                    <th>Tên quận huyện</th>
                    <th>Tên xã phường</th>
                    <th>Phí vận chuyển</th>
                </tr>
            </thead>
            <tbody>
            ';
            foreach($feeship as $key =>$fee){
            $output .='
                <tr>
                    <td>'.$fee->city->name_city.'</td>
                    <td>'.$fee->province->name_quanhuyen.'</td>
                    <td>'.$fee->wards->name_xaphuong.'</td>
                    <td contenteditable="" data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
                </tr>';
                }
                $output .='
            </tbody>
        </table>
    </div>';
    echo $output;
    }



}
