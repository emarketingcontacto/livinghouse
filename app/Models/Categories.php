<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $table ='categories';
    protected $primaryKey = 'categoryId';
    public $timestamps = false;

    protected $fillable =
    [
        'categoryName'
    ];

    public function properties():BelongsTo
    {
        return $this->belongsTo(Properties::class);
    }
}
