<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Properties extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $primaryKey = 'propId';
    public $timestamps = false;

    protected $fillable =
    [
        'propId',
        'propName',
        'propBaths',
        'propBedroom',
        'propBuilt',
        'propTerrain',
        'propGarden',
        'propStreetNum',
        'propNeighborhood',
        'propCity',
        'propState',
        'propParking',
        'propPrice',
        'propStatus',
        'propDetails',
        'propDescription',
        'propSurveillance',
        'categoryId',
        'biztypeId',
        'inmoId',
        'contactoId'
    ];

    public function biztype(): HasOne
    {
        return $this->hasOne(Biztype::class);
    }

    public function inmoId(): HasOne{
        return $this->hasOne(Inmobiliarias::class);
    }

    public function categories(): HasOne
    {
        return $this->hasOne(Categories::class);
    }

    public function images():HasMany
    {
        return $this->hasMany(Images::class);
    }
}
