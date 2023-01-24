<?php

use App\Models\Category;
use function Pest\Laravel\{post, delete, patch};

uses()->group('categories');

test('A User can create a new category')
    ->asUser()
    ->expect(fn() => test()->category = Category::factory()->raw())
    ->expect(fn() =>
        post(route('categories.store'), test()->category)
        ->assertRedirect(route('categories.index'))
    )->expect(fn() => test()->category)->toBeInDatabase('categories');

test('A User can update a category')
    ->asUser()
    ->expect(fn() => test()->category = Category::factory()->create())
    ->expect(fn() => test()->updatedData = Category::factory()->raw())
    ->expect(fn() =>
        patch(route('categories.update', ['category' => test()->category->id]), test()->updatedData)
            ->assertRedirect(route('categories.index')))
    ->expect(fn() => test()->updatedData)->toBeInDatabase('categories');

test('A User can delete a category')
    ->asUser()
    ->expect(fn() => test()->category = Category::factory()->create())
    ->expect(fn() =>
        delete(route('categories.destroy', test()->category->id))
        ->assertRedirect(route('categories.index'))
    )->expect(fn() => test()->category->toArray())
        ->not->toBeInDatabase('categories');
