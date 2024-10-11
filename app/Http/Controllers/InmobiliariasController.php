<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inmobiliarias;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class InmobiliariasController extends Controller
{
    //Display listing
    public function index()
    {
        $inmobiliarias = DB::table('inmobiliarias')
        ->select('inmobiliarias.*')
        ->get();

        return view('Inmobiliarias.index', ['inmobiliarias'=>$inmobiliarias]);
    }

    //Show Inmo
    public function show(Inmobiliarias $inmo)
    {
        $contactos=DB::table('contactos')
        ->where('inmoId', '=', $inmo->inmoId)
        ->get();


        $propiedades = DB::table('properties')
        ->select ('properties.propName', 'properties.propId','properties.propDetails', 'categories.categoryName', 'biztypeName', 'images.imageName')
        ->join('categories', 'categories.categoryId', '=','properties.categoryId' )
        ->join('biztype', 'biztype.biztypeId', '=', 'properties.biztypeId')
        ->join('images', 'images.propId', '=','properties.propId')
        ->where('properties.inmoId','=',$inmo->inmoId)
        ->orderBy('properties.propId', 'desc')
        ->get();




        return view('Inmobiliarias.show', ['inmo'=>$inmo, 'contactos'=>$contactos, 'propiedades'=>$propiedades]);
    }

    // Create
    public function create(){
        return view('Inmobiliarias.create');
    }

    // Store
    public function store(Request $request){

       //dd($request->file('inmoLogo'));

        $validData = $request->validate(
            [
                'inmoName'=> 'required',
                'inmoWeb'=> 'nullable',
                'inmoAddress'=> 'required'
            ]
        );

        if($request->hasFile('inmoLogo'))
        {
            $validData['inmoLogo'] = $request->file('inmoLogo')->store('logos', 'public');
        }

        Inmobiliarias::create($validData);
        return redirect('Inmobiliarias')->with('success', 'Creación Éxitosa');
    }

    //Edit
    public function edit(Inmobiliarias $inmo){
        return view('Inmobiliarias.edit', ['inmo'=>$inmo]);
    }

    //Update
    public function update(Request $request, Inmobiliarias $inmo)
    {
       // dd($request->inmoLogoNew);

        $validData = $request->validate(
            [
                'inmoName'=> 'required',
                'inmoLogo'=> 'nullable',
                'inmoWeb'=> 'nullable',
                'inmoAddress'=> 'required'
            ]
        );

        if($request->hasFile('inmoLogo'))
        {
            //delete old Image
            Storage::disk('public')->delete($inmo->inmoLogo);
        }

         //Save new Image
         $validData['inmoLogo']= $request->file('inmoLogo')->store('logos', 'public');
         //Update Inmo
        $inmo->update($validData);
        return redirect('Inmobiliarias')->with('success', 'Edición Exitósa!');
    }

    public function destroy(Inmobiliarias $inmo)
    {

        //dd($inmo->inmoLogo);

        //Delete storage Image
        Storage::disk('public')->delete($inmo->inmoLogo);

        //Delete record on DB
        $inmo->delete();

        //Return Redirect
        return redirect('Inmobiliarias')->with('success', 'Eliminación Exitósa!');
    }
}
