<?php

use App\Models\Category;

uses()->group('categories');

test('Can get active only categories')
    ->expect(fn() => Category::factory()->inActive()->count(5)->create())
    ->expect(fn() => Category::active()->count())
        ->toBe(0)
    ->expect(fn() => Category::factory()->count(3)->create())
    ->expect(fn() => Category::active()->count())
        ->toBe(3);
