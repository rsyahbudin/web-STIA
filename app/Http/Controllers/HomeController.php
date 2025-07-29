<?php

namespace App\Http\Controllers;

use App\Models\FoodProduct;
use App\Models\ActivePharmaceuticalIngredient;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get company profile data
        $companyProfile = CompanyProfile::getCompanyData();
        
        // Get featured products (first 6 of each category)
        $featuredFoodProducts = FoodProduct::take(6)->get();
        $featuredApis = ActivePharmaceuticalIngredient::take(6)->get();
        
        return view('home', compact('companyProfile', 'featuredFoodProducts', 'featuredApis'));
    }
}