<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [

        'title', 'body', 'location_id', 'status',

    ];

    public function Location()
    {
        return $this->belongsTo(Location::class);
    }
}
