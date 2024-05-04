<?php

namespace App\Models;

use App\Mail\MessageCreatedMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Message extends Model
{
    protected $guarded = [

    ];
    use HasFactory;

    protected static function booted()
    {
        static::created(function ($item) {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MessageCreatedMail($item));
        });
    }
}
