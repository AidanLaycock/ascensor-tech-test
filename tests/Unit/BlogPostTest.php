<?php

use App\Models\BlogPost;

uses()->group('blog');

test('A blog post is created with a URL automatically')
    ->expect(fn() => BlogPost::factory()->create(['title' => 'testing 123']))
    ->slug->toEqual('testing-123');

test('A Blog post can have categories');
