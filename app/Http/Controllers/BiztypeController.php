<?php

namespace App\Http\Controllers;

use App\Models\Biztype;
use Illuminate\Http\Request;

class BiztypeController extends Controller
{
    public function index()
    {
        return view ('Biztype.index', ['biztypes'=> Biztype::all()]);
    }

    public function create()
    {
        return view('Biztype.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $validData = $request->validate(
            [
                'biztypeName' => 'required |unique:biztype'
            ]
        );
        Biztype::create($validData);
        return redirect('Biztype')->with('success', 'Creación Exitosa');
    }

    public function show(Biztype $biztype)
    {
        //
    }

    public function edit(Biztype $biztype)
    {
        return view('Biztype.edit', ['biztype'=>$biztype]);
    }

    public function update(Request $request, Biztype $biztype)
    {
       // dd($request);
       $validData = $request->validate(
        [
            'biztypeName' => 'required |unique:biztype'
        ]
    );
        $biztype->update($validData);
        return redirect('Biztype')->with('success', 'Edicion Exitósa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biztype $biztype)
    {
        $biztype->delete();
        return redirect('Biztype')->with('success', 'Eliminación Exitosa!');
    }
}
