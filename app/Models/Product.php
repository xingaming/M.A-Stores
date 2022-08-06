<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable =['name', 'price', 'img'];
    protected $primaryKey = 'id';
    protected $table = 'product';

}
