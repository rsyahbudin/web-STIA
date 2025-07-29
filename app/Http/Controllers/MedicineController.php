<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $query = Medicine::query();
        
        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        
        // Search by name if provided
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        $medicines = $query->get();
        $categories = Medicine::select('category')->distinct()->pluck('category');
        
        return view('medicines.index', compact('medicines', 'categories'));
    }
    
    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        $relatedMedicines = Medicine::where('category', $medicine->category)
            ->where('id', '!=', $medicine->id)
            ->limit(4)
            ->get();
            
        return view('medicines.show', compact('medicine', 'relatedMedicines'));
    }
}