<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin/admin');
    }

    public function add(Request $request)  //add new product
    {

        if ($request->all() <> []) {
            $fileName = null;
            if ($files = $request->file('file_image')) {
                $fileName = $files->getClientOriginalName();
                $files->move('images/', $fileName);
            }
            $name = $request->get('product_name');
            $price = $request->get('product_price');
            $description = $request->get('product_description');
            App\product::addNewProduct($name, $price, $description, $fileName);
        }
        return view('admin/add');
    }

    public function edit(Request $request)    //edit product
    {
        if ($request->all() <> []) {
            $fileName = null;
            $name = $request->get('edit_product_name');
            $price = $request->get('edit_product_price');
            $description = $request->get('edit_product_description');
            $id = $request->get('productId');
            $originalImage = $request->get('originalImage');
            if ($files = $request->file('edit_file_image')) {
                $fileName = $files->getClientOriginalName();
                $files->move('images/', $fileName);
            }
            if ($originalImage) {
                $fileName = $originalImage;
            }
            App\product::editProduct($id, $name, $price, $description, $fileName);
        }
        $data = App\product::getAllProducts();
        return view('admin/edit', ['data' => $data]);
    }

    public function getEditProduct(Request $request)
    {
        $data = App\product::getProductData($request->id);
        return response()->json(['data' => $data]);
    }

    public function deleteProduct(Request $request)
    {
        $id =  $request->get('id');
        App\product::deleteProduct($id);
    }

}
