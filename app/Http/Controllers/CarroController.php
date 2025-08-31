<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('car_model')) {
            $query->where('modelo', 'like', '%' . $request->car_model . '%')
                  ->orWhere('marca', 'like', '%' . $request->car_model . '%');
        }

        if ($request->filled('monthly_pay')) {
            $query->where('valor_mensal', '<=', $request->monthly_pay);
        }

        if ($request->filled('year')) {
            $query->where('ano', $request->year);
        }

        $carros = $query->paginate(12); // ou ->get()

        return view('carros.index', compact('carros'));
    }
}