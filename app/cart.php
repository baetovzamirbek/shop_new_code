<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{

  public static function readFromCart()
  {
    $data = DB::table('cart')
      ->join('product', 'product.id', '=', 'cart.product_id')
      ->select('cart.*', 'product.name', 'product.price')
      ->get();
    return $data;
  }

  public static function insertToCart($product_id, $quantity)
  {
    DB::table('cart')->insert(
      ['product_id' => $product_id, 'quantity' => $quantity]
    );
  }

  public static function deleteFromCart($product_id)
  {
    DB::table('cart')->where('product_id', '=', $product_id)->delete();
  }

  public static function updateCounterCart($product_id, $quantity)
  {
      DB::table('cart')
          ->where('product_id', $product_id)
          ->update(['quantity' => $quantity]);
  }

  public static function checkInCart($product_id)
  {
      return count(DB::table('cart')->where('product_id', $product_id)->get());
  }

}
