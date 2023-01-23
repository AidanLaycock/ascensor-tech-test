<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Blog/index', [
            'posts' => BlogPost::select(['id', 'title', 'slug', 'publish_at', 'status', 'created_at', 'updated_at'])
                                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Blog/edit', [
            'post' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogPostRequest $request
     * @return RedirectResponse
     */
    public function store(BlogPostRequest $request): RedirectResponse
    {
        BlogPost::create($request->validated());

        return to_route('blog.index');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlogPost $blog
     * @return \Inertia\Response
     */
    public function edit(BlogPost $blog)
    {
        return Inertia::render('Blog/edit', [
            'post' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogPostRequest $request
     * @param BlogPost $blog
     * @return RedirectResponse
     */
    public function update(BlogPostRequest $request, BlogPost $blog): RedirectResponse
    {
        $blog->update($request->validated());

        return to_route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(BlogPost $blog): RedirectResponse
    {
        $blog->delete();

        return to_route('blog.index');
    }
}
