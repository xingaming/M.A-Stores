<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $fillable =['shipping_name','shipping_phone', 'shipping_email' , 'shipping_address'];
    protected $primaryKey = 'shipping_id';
    protected $table = 'tbl_shipping';
}
