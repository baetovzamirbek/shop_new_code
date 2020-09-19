<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pagination extends Model
{
    public static function productPagination($page, $limit)
    {
        $offset = ($page-1) * $limit;
        $data = DB::table('product')->limit($limit)->offset($offset)->get();
        return $data;
    }
}
