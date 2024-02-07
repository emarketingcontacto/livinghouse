<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biztype extends Model
{
    use HasFactory;
    protected $table = 'biztype';
    protected $primaryKey = 'biztypeId';
    public $timestamps = false;

    protected $fillable =
    [
        'biztypeName'
    ];

    // public function properies(): HasOne
    // {
    //     return $this->hasOne(properties::class);
    // }

    public function properties():BelongsTo
    {
        return $this->belongsTo(Properties::class);
    }
}
