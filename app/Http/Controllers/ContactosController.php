<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\Inmobiliarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ContactosController extends Controller
{
    //Index
    public function index()
    {
        $contactos = DB::table('contactos')
        ->join('inmobiliarias', 'inmobiliarias.inmoId', '=', 'contactos.inmoId')
        ->select('contactos.*', 'inmobiliarias.*')
        ->get();

        return view('Contactos.index', ['contactos'=>$contactos]);
    }

    //Create
    public function create()
    {
        $inmobiliarias = Inmobiliarias::all();
        return view('Contactos.create', ['inmobiliarias'=>$inmobiliarias]);
    }

    //Store
    public function store(Request $request)
    {
        //Validation
        $validData= $request->validate(
            [
                'contactoName'=>'required',
                'contactoPhone'=>'required',
                'contactoEmail'=>'required',
                'inmoId'=>'required'
            ]
        );

        Contactos::create($validData);
        return redirect('Contactos')->with('success', 'Creación Exitósa');
    }

    //Edit
    public function edit(Contactos $contacto)
    {
        $inmobiliarias = Inmobiliarias::all();
        return view('Contactos.edit', ['inmobiliarias'=>$inmobiliarias, 'contacto'=>$contacto]);
    }

    //Update
    public function update(Request $request, Contactos $contacto)
    {
        //validations
        $validData = $request->validate(
            [
              'contactoName'=>'required',
              'contactoPhone'=>'required',
              'contactoEmail'=>'required',
              'inmoId'=>'required'
            ]
        );

        $contacto->update($validData);
        return redirect('Contactos')->with('success', 'Edición Exitósa');
    }

    //Delete
    public function destroy(Contactos $contacto)
    {
        $contacto->delete();
        return redirect('Contactos')->with('success', 'Eliminado Exitosamente!');
    }

}
