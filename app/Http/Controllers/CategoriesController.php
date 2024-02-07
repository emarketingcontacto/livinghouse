<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('Categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        $validData = $request->validate(
            [
                'categoryName' => 'required | unique:categories'
            ]
        );

        Categories::create($validData);
        return redirect('Categories')->with('success', 'Creado Exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $category)
    {
        return view('Categories.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $category)
    {
        //dd($request);
        //dd($category);

        $validData = $request->validate(
            [
                'categoryName' => 'required | unique:categories'
            ]
        );

        $category->update($validData);
        return redirect('Categories')->with('success', 'Edición Exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $category)
    {
        //dd($category);
        $category->delete();
        return redirect('Categories')->with('success', 'Eliminación Exitosa!');
    }
}
