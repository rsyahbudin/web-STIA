<?php

namespace App\Http\Controllers;

use App\Models\FoodProduct;
use App\Models\ActivePharmaceuticalIngredient;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'food');
        $search = $request->get('search');
        $companyProfile = CompanyProfile::getCompanyData();

        // Get total counts for tabs
        $totalFoodProducts = FoodProduct::count();
        $totalApiProducts = ActivePharmaceuticalIngredient::count();

        $foodQuery = FoodProduct::query();
        if ($search && $activeTab === 'food') {
            $foodQuery->where('name', 'like', '%' . $search . '%')
                ->orWhere('manufacturer', 'like', '%' . $search . '%')
                ->orWhere('country', 'like', '%' . $search . '%');
        }
        $foodProducts = $foodQuery->paginate(12)->withQueryString();

        $apiQuery = ActivePharmaceuticalIngredient::query();
        if ($search && $activeTab === 'api') {
            $apiQuery->where('name', 'like', '%' . $search . '%')
                ->orWhere('manufacturer', 'like', '%' . $search . '%')
                ->orWhere('country', 'like', '%' . $search . '%');
        }
        $apiProducts = $apiQuery->paginate(12)->withQueryString();

        $selectedProduct = null;
        if ($request->has('product')) {
            $productId = $request->get('product');
            if ($activeTab === 'food') {
                $selectedProduct = FoodProduct::find($productId);
            } else {
                $selectedProduct = ActivePharmaceuticalIngredient::find($productId);
            }
        }

        return view('catalog.index', compact(
            'foodProducts',
            'apiProducts',
            'activeTab',
            'search',
            'companyProfile',
            'selectedProduct',
            'totalFoodProducts',
            'totalApiProducts'
        ));
    }

    public function show($type, $id)
    {
        $companyProfile = CompanyProfile::getCompanyData();

        if ($type === 'food') {
            $product = FoodProduct::findOrFail($id);
            $relatedProducts = FoodProduct::where('id', '!=', $product->id)
                ->limit(4)
                ->get();
        } else {
            $product = ActivePharmaceuticalIngredient::findOrFail($id);
            $relatedProducts = ActivePharmaceuticalIngredient::where('id', '!=', $product->id)
                ->limit(4)
                ->get();
        }

        return view('catalog.show', compact('product', 'relatedProducts', 'companyProfile', 'type'));
    }
}
