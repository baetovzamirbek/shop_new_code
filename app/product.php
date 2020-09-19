<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product extends Model
{

    public static function getAllProducts()
    {
        $data = DB::table('product')->get();
        return $data;
    }

    public static function getProductData($id)
    {
        $data = DB::table('product')->find($id);
        return $data;
    }

    public static function addNewProduct($name, $price, $description, $fileName)
    {
        date_default_timezone_set('Asia/Bishkek');
        $creation_date = date('Y/m/d H:i:s');
        if ($fileName)
            $fileName = '/images/'.$fileName;
        DB::table('product')->insert(
            [   'name' => $name,
                'price' => $price,
                'description' => $description,
                'creation_date' => $creation_date,
                'image' => $fileName
            ]
        );
    }

    public static function editProduct($id, $name, $price, $description, $fileName)
    {
        date_default_timezone_set('Asia/Bishkek');
        $creation_date = date('Y/m/d H:i:s');

        if ($fileName != DB::table('product')->find($id)->image && $fileName != '')
            $fileName = '/images/'.$fileName;
        DB::table('product')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'creation_date' => $creation_date,
                'image' => $fileName
            ]);
    }

    public static function deleteProduct($id){
        DB::table('product')->where('id', '=', $id)->delete();
    }
}
