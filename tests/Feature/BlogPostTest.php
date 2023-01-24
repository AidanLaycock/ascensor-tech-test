<?php

use App\Models\BlogPost;
use function Pest\Laravel\{get, post, delete, patch};

uses()->group('blog', 'categories');

test('A User can create a new blog post')
    ->asUser()
    ->expect(fn() =>
            post(route('blog.store'), BlogPost::factory()->raw())
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
    ->expect(fn() => test()->post = BlogPost::factory()->create())
    ->expect(fn() => get('/')->assertSee(test()->post->title));

test('A User can create a blog post that is visible and then update it to be unpublished')
    ->asUser()
    ->expect(fn() => test()->post = BlogPost::factory()->create())
        ->expect(fn() => get('/')->assertSee(test()->post->title))
    ->expect(fn() => test()->updatedData = BlogPost::factory()->unpublished()->raw())
    ->expect(fn() => patch(route('blog.update', ['blog' => test()->post->id]), test()->updatedData)->assertRedirect(route('blog.index')))
    ->expect(fn() => get('/')->assertDontSee(test()->post->title));

test('A User can add categories to a blog')
    ->asUser()
    ->expect(fn() => test()->category = \App\Models\Category::factory()->raw())
    ->expect(fn() => test()->post = BlogPost::factory()->withCategories(test()->category)->raw())
    ->expect(fn() => post(route('blog.store'), test()->post)
        ->assertRedirect(route('blog.index')));
