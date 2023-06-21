<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Species::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel('api')->info('created', ['item' => $request->except("_token")]);
        return Species::create($request->only(["name"]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Species $species)
    {
        return $species;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Species $species)
    {
        $species->update($request->all());
        Log::channel('api')->info('updated', ['item' => $request->except("_token")]);
        return $species;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Species $species)
    {
        Log::channel('api')->info('deleted', ['item' => $species]);
        $species->delete();
    }
}
