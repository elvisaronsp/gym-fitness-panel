<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    protected $product = null;
    
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    
    public function index()
    {
        $products = $this->product
                ->with('CurrentQuantity')
                ->all();
        
        return view('panel.product.index', compact('products'));
    }
    
    public function create()
    {
        return view('panel.product.create');
    }
    
    public function store(\App\Http\Requests\StoreProductRequest $request)
    {
        $this->product->create($request->all());
        
        return redirect(route('panel.product.index'));
    }
    
    public function delete($id)
    {
        $this->product->delete($id);
        
        return redirect(route('panel.product.index'));
    }
}
