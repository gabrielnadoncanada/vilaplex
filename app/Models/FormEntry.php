<?php

namespace App\Models;

use App\Mail\MessageCreatedMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class FormEntry extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($item) {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MessageCreatedMail($item));
        });
    }
}
