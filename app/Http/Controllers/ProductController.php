<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class ProductController extends Controller
{
  public function index($id) {
    $data = App\product::getProductData($id);
    $checkInCart = App\cart::checkInCart($id);
    //$request = Request;
    //dump(AccountController::checkLogin($request));
    return view('product', ['product' => $data, 'checkInCart' => $checkInCart ] );
  }

  public function review(Request $request) {
          return response()->json(['sum' => $request]);

  }

}
