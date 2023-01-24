<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
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
            'post' => null,
            'categories' => Category::active()->get(['*', 'id as category_id'])->toArray()
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
        $post = BlogPost::create($request->validated());
        $request->has('categories') ? $post->categories()->sync($request->categories) : null;

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
        $blog->load('categories');

        return Inertia::render('Blog/edit', [
            'post' => $blog,
            'categories' => Category::select('id as category_id')->active()->get()->toArray()
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
        $request->has('categories') ? $blog->categories()->sync($request->categories) : null;

        return to_route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BlogPost $blog
     * @return RedirectResponse
     */
    public function destroy(BlogPost $blog): RedirectResponse
    {
        $blog->delete();

        return to_route('blog.index');
    }
}
