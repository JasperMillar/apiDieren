<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Animal::all();
    }

    public function indexSpecie( $id)
    {
        return Animal::where('species_id',$id)->get();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::channel('api')->info('created', ['item' => $request->except("_token")]);
        return Animal::create($request->only(["name", "species_id"]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return $animal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        $animal->update($request->all());
        Log::channel('api')->info('updated', ['item' => $request->except("_token")]);
        return $animal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        Log::channel('api')->info('deleted', ['item' => $animal]);
        $animal->delete();
    }
}
