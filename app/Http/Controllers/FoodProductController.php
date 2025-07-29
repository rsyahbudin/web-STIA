<?php

namespace App\Http\Controllers;

use App\Models\FoodProduct;
use Illuminate\Http\Request;

class FoodProductController extends Controller
{
    public function index(Request $request)
    {
        $query = FoodProduct::query();
        
        // Search by name if provided
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $products = $query->get();
        
        return view('products.index', compact('products'));
    }
    
    public function show($id)
    {
        $product = FoodProduct::findOrFail($id);
        $relatedProducts = FoodProduct::where('id', '!=', $product->id)
            ->limit(4)
            ->get();
            
        return view('products.show', compact('product', 'relatedProducts'));
    }
}