<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'link',
        'type',
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::creating(static function ($object) {
            $object->user_id = user()->id;
        });
    }
}
