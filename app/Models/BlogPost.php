<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\BlogPostSource;
class BlogPost extends Model
{
    /** @use HasFactory<\Database\Factories\BlogPostFactory> */
    use HasFactory;

    protected $casts = [
        'source' => BlogPostSource::class,
    ];
}
