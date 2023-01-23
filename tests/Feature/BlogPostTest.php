<?php

use App\Models\BlogPost;
use function Pest\Laravel\{delete, patch};

uses()->group('blog', 'categories');

test('A User can create a new blog post')
    ->asUser()
    ->expect(fn() =>
        test()->post(route('blog.store'), BlogPost::factory()->raw())
              ->assertRedirect(route('blog.index'))
    );

test('A User can update a blog post')
    ->asUser()
    ->expect(fn() => test()->post = BlogPost::factory()->create())
    ->expect(fn() => test()->updatedData = BlogPost::factory()->raw())
    ->expect(fn() => patch(route('blog.update', ['blog' => test()->post->id]), test()->updatedData)->assertRedirect(route('blog.index')))
    ->expect(fn() => test()->updatedData)->toBeInDatabase('blog_posts');


test('A User can delete a blog post')
    ->asUser()
    ->expect(fn() => test()->post = BlogPost::factory()->create())
    ->expect(fn() => delete(route('blog.destroy', test()->post->id))
                    ->assertRedirect(route('blog.index'))
    );


test('A User can create an unpublished blog post and it wont be visible for the public')
    ->asUser()
    ->expect(fn() => BlogPost::factory()->unpublished()->create())
    ->expect(fn() => BlogPost::published()->count())
        ->toBe(0)
    ->expect(fn() => BlogPost::factory()->count(5)->create())
    ->expect(fn() => BlogPost::published()->count())
        ->toBe(5);

test('A User can create a blog post that is visible and then update it to be unpublished');

test('A User can add categories to a blog');
