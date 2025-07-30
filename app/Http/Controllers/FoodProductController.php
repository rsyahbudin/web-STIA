<?php

namespace App\Http\Controllers;

use App\Models\FoodProduct;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

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

        $companyProfile = CompanyProfile::getCompanyData();


        return view('products.index', compact('products', 'companyProfile'));
    }

    public function show($id)
    {
        $companyProfile = CompanyProfile::getCompanyData();

        $product = FoodProduct::findOrFail($id);
        $relatedProducts = FoodProduct::where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts', 'companyProfile'));
    }
}
