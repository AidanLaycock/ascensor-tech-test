<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = ['title', 'slug', 'content', 'publish_at', 'status'];

    protected static function booted(): void
    {
        parent::boot();

        static::saving(fn($model) => $model->url = Str::slug($model->title));
    }

    public function categories(): MorphMany
    {
        return $this->morphMany(Category::class, 'categorisable');
    }

}
