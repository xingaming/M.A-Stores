<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{


      public $products = null;
      public $totalPrice = 0;
      public $totalQuanty = 0;
      public $total = 0;

      public function __construct($cart){
          if($cart){
              $this->products = $cart->products;
              $this->totalPrice = $cart->totalPrice;
              $this->totalQuanty = $cart->totalQuanty;
          }
      }
      public function AddCart($products, $id){
          $newProduct = ['quanty'=> 0, 'price'=> $products->price , 'productInfo' => $products];
          if($this -> products){
              if(array_key_exists($id,$this->products)){
                  $newProduct = $this->products[$id];
              }
          }
          $newProduct['quanty']++;
          $newProduct['price'] = $newProduct['quanty'] * $products->price;
          $this->products[$id] = $newProduct;
          $this->totalPrice +=$products->price;
          $this->totalQuanty++;
      }

      public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
      }

      public function UpdateItemCart($id, $quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty *  $this->products[$id]['productInfo']->price;

        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
      }

}
