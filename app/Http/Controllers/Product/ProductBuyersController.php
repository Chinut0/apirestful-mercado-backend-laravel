<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProductBuyersController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $buyers = $product->transactions()->with('buyer')->get()->pluck('buyer')->unique()->values();

        return $this->showAll($buyers);
    }
}
