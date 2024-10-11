<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmobiliarias extends Model
{
    use HasFactory;
    protected $table = 'inmobiliarias';
    protected $primaryKey = 'inmoId';
    public $timestamps = false;

    protected $fillable =
    [
        'inmoId',
        'inmoName',
        'inmoWeb',
        'inmoAddress',
        'inmoLogo'
    ];
}
