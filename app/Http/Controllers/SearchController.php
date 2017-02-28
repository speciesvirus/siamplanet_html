<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return view('post')->with([
            'unit' => ProductUnit::ddl(),
            'type' => ProductType::ddl(),
            'sale' => ProductSale::ddl(),
            'area' => ProductArea::ddl(),
            'facility' => ProductFacility::ddl()
        ]);

    }
}
