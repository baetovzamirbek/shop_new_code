<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use App\Api;


class CartController extends Controller
{
    public $isbn;
    public $title;
    public $author;
    public $available;

    public function index()
    {
        $data = App\cart::readFromCart();
        $total = 0;
        foreach ($data as $item) {
            $total += $item->price * $item->quantity;
        }
        //return view('cart', ['cart_products' => $data, 'total' => $total ]);

        $harry_potter = new CartController();
        $harry_potter->isbn = 98937298329;
        $harry_potter->title = "Harry potter and the magicians";
        $harry_potter->author = "Jacck ross";
        $harry_potter->available = 0;

        if ($harry_potter->getCopy()) {
            dump('Here is your copy of ' . $harry_potter->title);
        } else {
            dump('Sorry its gone!');
        }

        dump($harry_potter);
    }

    public function add(Request $request)
    {
        if ($request) {
            App\cart::insertToCart($request->product_id, $request->quantity);
            return response()->json();
        }
    }

    public function delete(Request $request)
    {
        if ($request) {
            App\cart::deleteFromCart($request->product_id);
            $total = $this->readFromCart();
            return response()->json(['sum' => $total]);
        }
    }

    public function update(Request $request)
    {
        if ($request) {
            App\cart::updateCounterCart($request->product_id, $request->quantity);
            $total = $this->readFromCart();
            return response()->json(['sum' => $total]);
        }
    }

    protected function readFromCart()
    {
        $data = App\cart::readFromCart();
        $total = 0;
        if (count($data) <> 0) {
            foreach ($data as $item) {
                $total += $item->price * $item->quantity;
            }
            return $total;
        } else {
            return 0;
        }
    }


    public function getPrintableTitle()
    {
        // $this represets the object itself, you can access properties and methods using $this
        $result = $this->title . ' - ' . ' by ' . $this->author;
        if (!$this->available) {
            $result .= 'Not available';
        }
    }

    // lets create another method that will update the values of the current object
    public function getCopy()
    {
        if ($this->available < 1) {
            return false;
        } else {
            $this->available--;
            return true;
        }
    }



}
