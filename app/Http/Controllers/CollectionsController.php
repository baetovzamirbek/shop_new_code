<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class CollectionsController extends Controller
{
    public function index($page)
    {
        $page = trim($page, "page-");
        $limit = 6;
        $count = ceil(count(App\product::getAllProducts()) / $limit);
        $data = App\pagination::productPagination($page, $limit);
        return view('collections', ['data' => $data, 'page' => $page, 'count' => $count]);
    }
}
