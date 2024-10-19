<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class Neighborhood extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $routeName){ }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $neighborhoods = DB::table('properties')
        ->select('properties.propNeighborhood' )
        ->distinct('properties.propNeighborhood')
        ->get();

        return view('components.neighborhood', ['neighborhoods' =>$neighborhoods ]);
    }
}
