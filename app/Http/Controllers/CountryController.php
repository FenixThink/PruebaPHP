<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nameCountries' => 'required|string',
            ]);
            $country=Country::Create([
                'nameCountries' => $request-> nameCountries,
                ]);
            return response()->json([
                'message'=> $country
            ], 201);
            }catch(\Exeption $th){
                return response()->json([
                    'message'->$th->getMessage()
                ],401);
            }

    }
    public function index()
    {
        try {
            return  Country::all();
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
