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
        'propDepth',
        'propFront',
        'propTotal',
        'propGarden',
        'propStreetNum',
        'propNeighborhood',
        'propCity',
        'propState',
        'propParking',
        'propPrice',
        'propStatus',
        'propDetails',
        'propSurveillance',
        'categoryId',
        'biztypeId'
    ];

    public function biztype(): HasOne
    {
        return $this->hasOne(Biztype::class);
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
