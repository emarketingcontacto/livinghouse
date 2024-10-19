<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Comercios extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $TypeUpload = 'Comercio';

        if($request->bizmode === null || $request->bizmode === 'all')
        {
            $propiedades = DB::table('properties')
            ->join('categories', 'categories.categoryId', '=', 'properties.categoryId')
            ->join('biztype','biztype.biztypeId', '=', 'properties.biztypeId')
            ->join('images','images.propId', '=', 'properties.propId')
            ->join('inmobiliarias','inmobiliarias.inmoId' , '=', 'properties.inmoId' )
                ->select(
                    'properties.*',
                    'categories.categoryName',
                    'biztype.biztypeName',
                    'images.imageName',
                    'inmobiliarias.inmoLogo',
                    'inmobiliarias.inmoName'
                )
            ->where('categoryName', '=', $TypeUpload)
            ->where('properties.propNeighborhood', 'LIKE', '%'.$request->propneighborhood.'%' )
            ->get();

        }else{

            $propiedades = DB::table('properties')
            ->join('categories', 'categories.categoryId', '=', 'properties.categoryId')
            ->join('biztype','biztype.biztypeId', '=', 'properties.biztypeId')
            ->join('images','images.propId', '=', 'properties.propId')
            ->join('inmobiliarias','inmobiliarias.inmoId' , '=', 'properties.inmoId' )

                ->select(
                    'properties.*',
                    'categories.categoryName',
                    'biztype.biztypeName',
                    'images.imageName',
                    'inmobiliarias.inmoLogo',
                    'inmobiliarias.inmoName'
                )
            ->where('categoryName', '=', $TypeUpload)
            ->where('biztype.biztypeName', '=',$request->bizmode)
            ->where('properties.propNeighborhood', 'LIKE', '%'.$request->propneighborhood.'%' )
            ->get();
        }
        return view('comercios', ['propiedades' => $propiedades, 'bizmode'=>$request->bizmode]);

    }
}
