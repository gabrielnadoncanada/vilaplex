<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'type', 'label', 'settings'];

    protected $casts = [
        'settings' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
