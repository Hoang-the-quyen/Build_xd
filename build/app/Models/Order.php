<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable = [
       'customer_id','order_status','order_total','order_time'
    ];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';
}
