<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'indexable',
        'image',
    ];

    protected $casts = [
        'id' => 'integer',
        'indexable' => 'boolean',
    ];

    public function metaable()
    {
        return $this->morphTo();
    }
}
