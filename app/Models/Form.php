<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function fields()
    {
        return $this->hasMany(FormField::class);
    }

    public function entries()
    {
        return $this->hasMany(FormEntry::class);
    }
}
