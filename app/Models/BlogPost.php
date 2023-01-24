<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\BlogPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;
use \Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Builder;


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
        'status' => 'boolean'
    ];

    /**
     * @return Builder
     */
    public function scopePublished()
    {
        return $this->where('publish_at', '<=', Carbon::now());
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categorisable');
    }

    protected static function newFactory(): Factory
    {
        return BlogPostFactory::new();
    }

}
