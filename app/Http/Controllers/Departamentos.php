<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Departamentos extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index (Request $request)
    {
        $TypeUpload = 'Departamento';

        if($request->bizmode === null || $request->bizmode === 'all')
        {
            $propiedades = DB::table('properties')
            ->join('categories', 'categories.categoryId', '=', 'properties.categoryId')
            ->join('biztype','biztype.biztypeId', '=', 'properties.biztypeId')
            ->join('images','images.propId', '=', 'properties.propId')
            ->select(
                'properties.*',
                'categories.categoryName',
                'biztype.biztypeName',
                'images.imageName'
            )
            ->where('categoryName', '=', $TypeUpload)
            ->get();

        }else{

            $propiedades = DB::table('properties')
            ->join('categories', 'categories.categoryId', '=', 'properties.categoryId')
            ->join('biztype','biztype.biztypeId', '=', 'properties.biztypeId')
            ->join('images','images.propId', '=', 'properties.propId')
            ->select(
                'properties.*',
                'categories.categoryName',
                'biztype.biztypeName',
                'images.imageName'
            )
            ->where('categoryName', '=', $TypeUpload)
            ->where('biztype.biztypeName', '=',$request->bizmode)
            ->get();
        }
        return view('departamentos', ['propiedades' => $propiedades, 'bizmode'=>$request->bizmode]);
    }


}
