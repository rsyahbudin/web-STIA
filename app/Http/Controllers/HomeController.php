<?php

namespace App\Http\Controllers;

use App\Models\FoodProduct;
use App\Models\ActivePharmaceuticalIngredient;
use App\Models\CompanyProfile;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // Get company profile data
        $companyProfile = CompanyProfile::getCompanyData();

        // Get featured products (maximum 3 of each category)
        $featuredFoodProducts = FoodProduct::take(3)->get();
        $featuredApis = ActivePharmaceuticalIngredient::take(3)->get();

        // Get featured customers
        $featuredCustomers = Customer::where('is_featured', true)->take(8)->get();

        return view('home', compact('companyProfile', 'featuredFoodProducts', 'featuredApis', 'featuredCustomers'));
    }
}
