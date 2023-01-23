<?php

namespace App\Models;

use Database\Factories\BlogPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use \Illuminate\Database\Eloquent\Factories\Factory;


class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = ['title', 'slug', 'content', 'publish_at', 'status'];

    protected static function booted(): void
    {
        static::saving(fn($model) => $model->slug = Str::slug($model->title));
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function categories(): MorphMany
    {
        return $this->morphMany(Category::class, 'categorisable');
    }

    protected static function newFactory(): Factory
    {
        return BlogPostFactory::new();
    }

}
