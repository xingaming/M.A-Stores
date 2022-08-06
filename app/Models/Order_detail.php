<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    public $timestamps = false;
    protected $fillable =['order_code','product_id', 'product_name', 'product_price', 'product_quantity'];
    protected $primaryKey = 'order_details_id';
    protected $table = 'order_detail';

    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
