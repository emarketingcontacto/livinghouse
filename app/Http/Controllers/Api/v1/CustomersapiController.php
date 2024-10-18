<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomersapiResource;

class CustomersapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return All
        //return Contactos::All();

        //using Resource
        return CustomersapiResource::collection(Contactos::all());
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //dd($id);
        $contacto = DB::table('contactos')
        ->where('inmoId', '=', $id)
        ->get();

        //return CustomersapiResource::make($contacto);
        return $contacto;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){ }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){}
}
