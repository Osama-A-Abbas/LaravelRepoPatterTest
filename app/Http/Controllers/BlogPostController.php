<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Http\Resources\BlogPostResource;
use App\Repositories\BlogPostRepositoryInterface;

class BlogPostController extends Controller
{

    public function __construct(
        protected BlogPostRepositoryInterface $blogPostRepository, //NEED TO REGISTER THIS INTERFACE IN THE AppServiceProvider register method
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BlogPostResource::collection(BlogPost::all());
    }


    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return BlogPostResource::make($blogPost);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogPostRequest $request)
    {
        return BlogPost::create($request->validated());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogPostRequest $request, BlogPost $blogPost)
    {
        return $blogPost->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        return $blogPost->delete();
    }
}
