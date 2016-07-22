<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use App\Repositories\ProductWarehouse\ProductWarehouseRepository;
use App\Http\Requests\StoreCorrectRequest;

class ProductWarehouseController extends Controller
{
    
    protected $product = null;
    protected $productWarehouse = null;
    
    public function __construct(ProductRepository $product, ProductWarehouseRepository $productWarehouse)
    {
        $this->product = $product;
        $this->productWarehouse = $productWarehouse;
    }
    
    /**
     * 
     * @param type $productId
     * @param type $quantity
     * @return type
     */
    public function sell($productId, $quantity = 1)
    {
        $product = $this->product->with('CurrentQuantity')->find($productId);
        $this->productWarehouse->saveProductSell($product, $quantity);
        
        return redirect(route('panel.product.index'));
    }
    
    /**
     * 
     * @param type $productId
     * @return type
     */
    public function getCorrect($productId)
    {
        $product = $this->product->with('CurrentQuantity')->find($productId);
        
        return view('panel.productWarehouse.correct', compact('product'));
    }
    
    /**
     * 
     * @param StoreCorrectRequest $request
     * @return type
     */
    public function storeCorrect(StoreCorrectRequest $request)
    {
        $product = $this->product->with('CurrentQuantity')->find($request->get('product_id'));
        $quantity = $request->get('quantity');
        
        $this->productWarehouse->saveProductCorrect($product, $quantity);
        
        return back();
    }
    
    /**
     * 
     * @param type $productId
     * @return type
     */
    public function getAdoption($productId)
    {
        $product = $this->product->find($productId);
        
        return view('panel.productWarehouse.adoption', compact('product'));
    }
    
    /**
     * 
     * @param StoreCorrectRequest $request
     * @return type
     */
    public function storeAdoption(StoreCorrectRequest $request)
    {
        $product = $this->product->with('CurrentQuantity')->find($request->get('product_id'));
        $quantity = $request->get('quantity');
        
        $this->productWarehouse->saveProductQuantity($product, $quantity);
        
        return back();
    }
}
