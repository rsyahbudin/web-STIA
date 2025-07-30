<?php

namespace App\Http\Controllers;

use App\Models\ActivePharmaceuticalIngredient;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivePharmaceuticalIngredient::query();

        // Search by name if provided
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $apis = $query->get();

        $companyProfile = CompanyProfile::getCompanyData();


        return view('apis.index', compact('apis', 'companyProfile'));
    }

    public function show($id)
    {
        $companyProfile = CompanyProfile::getCompanyData();

        $api = ActivePharmaceuticalIngredient::findOrFail($id);
        $relatedApis = ActivePharmaceuticalIngredient::where('id', '!=', $api->id)
            ->limit(4)
            ->get();

        return view('apis.show', compact('api', 'relatedApis', 'companyProfile'));
    }
}
