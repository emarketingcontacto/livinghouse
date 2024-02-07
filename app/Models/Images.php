<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Images extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $primaryKey = 'imageId';
    public $timestamps = false;

    protected $fillable =
    [
        'imageName',
        'propId'
    ];

    public function properties():BelongsTo
    {
        return $this->belongsTo(Properties::class);
    }
}
