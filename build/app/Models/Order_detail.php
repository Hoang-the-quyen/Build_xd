<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    public $timestamps = false;
    protected $fillable = [
       'order_id','product_id','shipping_id','product_quantity','order_detail_note'
    ];
    protected $primaryKey = 'order_detail_id';
    protected $table = 'tbl_order_detail';
}
