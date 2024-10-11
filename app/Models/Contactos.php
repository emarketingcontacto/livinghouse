<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;
use Illuminate\Database\Eloquent\Relations\HasMany as RelationsHasMany;

class Contactos extends Model
{
    use HasFactory;
    protected $table = 'contactos';
    protected $primaryKey = 'contactoId';
    public $timestamps = false;

    protected $fillable =
    [
        'contactoId',
        'contactoName',
        'contactoPhone',
        'contactoEmail',
        'inmoId'
    ];

    public function Inmobiliarias():RelationsHasMany
    {
        return $this->hasMany(Inmobiliarias::class);
    }
}
