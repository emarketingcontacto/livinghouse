<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Biztype;
use App\Models\Categories;
use App\Models\Properties;
use Illuminate\Http\Request;
use PhpParser\Builder\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Imagenes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Properties $property)
    {
        return view('Imagenes.create', ['property'=>$property]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        if($request->hasFile('image')){
            foreach ($request->file('image') as $image) {
                $validData['imageName'] = $image->store('props', 'public');
                $validData['propId'] = $request->propId;
                Images::create($validData);
            }

            $properties = Properties::all();
            $categories = Categories::all();
            $biztypes = Biztype::all();
        }


        return view('Properties.index', ['properties'=>$properties, 'categories'=> $categories, 'biztypes'=>$biztypes])->with('success', 'Imagenes Guaradas Exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Properties $property)
    {
        $images = DB::table('images')
        ->join('properties', 'images.propId', '=', 'properties.propId')
        ->select('images.*', 'properties.propName')
        ->where('images.propId', '=', $property->propId)
        ->get();

        // $properties = DB::table('properties')
        // ->select('propId', 'propName')
        // ->Where('propId', '=', $property->propId)
        // ->get();

        $property = Properties::find($property->propId);

        return view('Imagenes.edit', ['images'=>$images, 'property'=>$property]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $image)
    {
        //get Image id
        $propId = $image->propId;

        //delete image from system
        Storage::disk('public')->delete('public/storage/props', $image->imageName);

        //delete Image from db
        $image->delete();

        /*
            Return:
            if images iquals 0 return properties.index
            else
            return images.edit
        */

        $imagesCount = Images::Where('propId', $propId)->get()->count();

        if($imagesCount === 0 ){

            //redirect properties
            $properties = Properties::all();
            $categories = Categories::all();
            $biztypes = Biztype::all();

            return view('Properties.index', ['properties'=>$properties, 'categories'=> $categories, 'biztypes'=>$biztypes])->with('success', 'Imagenes Guaradas Exitosamente!');
        }

            // redirect Images Edit
            $images = DB::table('images')
            ->join('properties', 'images.propId', '=', 'properties.propId')
            ->select('images.*', 'properties.propName')
            ->where('images.propId', '=', $propId)
            ->get();

            $property = Properties::find($propId);

            return view('Imagenes.edit', ['images'=>$images, 'property'=>$property]);
    }
}
