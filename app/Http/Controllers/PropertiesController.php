<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Biztype;
use App\Models\Categories;
use App\Models\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Builder\Property;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$properties = Properties::all();

        $properties = DB::table('properties')
        ->join('categories', 'properties.categoryId','=', 'categories.categoryId')
        ->select('properties.*', 'categories.categoryName')
        ->get();

        $categories = Categories::all();
        $biztypes = Biztype::all();
        return view('Properties.index', ['properties'=>$properties, 'categories'=> $categories, 'biztypes'=>$biztypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $biztypes = Biztype::all();

        return view('Properties.create',['categories'=> $categories, 'biztypes'=>$biztypes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $validData = $request->validate(
            [
                'propName'=>'required',
                'propStreetNum'=>'required',
                'propNeighborhood'=>'required',
                'propCity'=>'required',
                'propState'=>'required',
                'propStatus'=>'required',
                'propPrice'=>'required | decimal:2',
                'propSurveillance'=>'nullable',
                'propGarden'=>'nullable',
                'propFront'=>'required | decimal:2',
                'propDepth'=>'required | decimal:2',
                'propTotal'=>'required | decimal:2',
                'propBedroom'=>'nullable',
                'propParking'=>'nullable',
                'propBaths'=>'nullable',
                'categoryId'=>'required',
                'biztypeId'=>'required',
                'propDetails'=>'required'
            ]
        );
        // surveillance
        if($request->propSurveillance === 'on')
        {
            $validData['propSurveillance'] = 1;
        }else{
            $validData['propSurveillance']= 0;
        }
        // garden
       if($request->propGarden == 'on'){
        $validData['propGarden'] = 1;
       }else{
        $validData['propGarden'] = 0;
       }

        Properties::create($validData);
        return redirect('Properties')->with('success', 'Creación Éxitosa!!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Properties $property)
    {
        //dd($property);
        //dd($images);
        $images = DB::table('images')->where('propId', '=' , $property->propId)->get();
        //biztype
        $biztype = DB::table('biztype')->where('biztypeId', '=', $property->biztypeId)->first();
        //category
        $category = DB::table('categories')->where('categoryId', '=', $property->categoryId)->first();

        return view('Properties.show', ['property'=>$property , 'images'=>$images, 'biztype'=>$biztype,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Properties $property)
    {
        $categories = Categories::all();
        $biztypes = Biztype::all();

        $imagesCount = Images::Where('propId', $property->propId)->get()->count();

        //dd($imagesCount);

        return view('Properties.edit', ['property'=>$property, 'categories'=>$categories, 'biztypes'=>$biztypes , 'imagesCount'=>$imagesCount]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Properties $property)
    {
        //dd($request);
        $validData = $request->validate(
            [
                'propName'=>'required',
                'propStreetNum'=>'required',
                'propNeighborhood'=>'required',
                'propCity'=>'required',
                'propState'=>'required',
                'propStatus'=>'required',
                'propPrice'=>'required | decimal:2',
                'propSurveillance'=>'nullable',
                'propFront'=>'required | decimal:2',
                'propDepth'=>'required | decimal:2',
                'propTotal'=>'required | decimal:2',
                'propBedroom'=>'nullable',
                'propParking'=>'nullable',
                'propBaths'=>'nullable',
                'categoryId'=>'required',
                'biztypeId'=>'required',
                'propDetails'=>'required'
            ]
        );

        // surveillance
        if($request->propSurveillance === 'on')
        {
            $validData['propSurveillance'] = 1;
        }else{
            $validData['propSurveillance']= 0;
        }

        // garden
       if($request->propGarden == 'on'){
        $validData['propGarden'] = 1;
       }else{
        $validData['propGarden'] = 0;
       }

       $property->update($validData);

       return redirect('Properties')->with('success', 'Edición Exitosa!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Properties $property)
    {
        // delete images related w/properties
        // get images from property
        $imagesCount = Images::Where('propId', $property->propId)->get()->count();
        if($imagesCount>0)
        {
            $images= DB::select('select * from images where propId=?', [$property->propId]);

            foreach ($images as $image) {
                Storage::disk('public')->delete('public/storage/props', $image->imageName);
                DB::delete('delete from images where imageId=?', [$image->imageId]);
            }

        }
        // delete property
        $property->delete();
        return redirect('Properties')->with('success', 'Eliminación Exitosa!');
    }
}
