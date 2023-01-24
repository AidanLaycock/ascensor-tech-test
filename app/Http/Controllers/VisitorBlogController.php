<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class VisitorBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('visitor/blog/index', [
            'posts' => BlogPost::select(['id', 'title', 'slug', 'publish_at', 'status', 'created_at', 'updated_at'])
                ->with('categories')
                ->published()
                ->get(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param BlogPost $post
     * @return Response
     */
    public function show(BlogPost $post)
    {
        return Inertia::render('visitor/blog/show', [
            'post' => $post,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
