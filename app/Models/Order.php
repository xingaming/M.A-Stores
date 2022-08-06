<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $fillable =['order_code','shipping_id','order_status','created_at'];
    protected $primaryKey = 'order_id';
    protected $table = 'tbl_order';


}
