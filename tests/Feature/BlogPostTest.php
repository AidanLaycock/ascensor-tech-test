<?php

uses()->group('blog', 'categories');

test('A User can create a new blog post');

test('A User can update a blog post');

test('A User can delete a blog post');

test('A User can create an unpublished blog post and it wont be visible for the public');

test('A User can create a blog post that is visible and then update it to be unpublished');

test('A User can add categories to a blog');
