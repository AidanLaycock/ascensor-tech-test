<?php

use App\Models\BlogPost;

uses()->group('blog');

test('A blog post is created with a URL automatically')
    ->expect(fn() => BlogPost::factory()->create(['title' => 'testing 123']))
    ->slug->toEqual('testing-123');

test('Can get published only posts')
    ->expect(fn() => BlogPost::factory()->unpublished()->create())
    ->expect(fn() => BlogPost::published()->count())
        ->toBe(0)
    ->expect(fn() => BlogPost::factory()->count(5)->create())
    ->expect(fn() => BlogPost::published()->count())
        ->toBe(5);

test('A Blog post can have categories');
