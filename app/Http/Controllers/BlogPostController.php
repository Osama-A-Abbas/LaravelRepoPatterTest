<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\BlogPostDto;
use App\Models\BlogPost;
use App\Http\Requests\BlogPostRequest;
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
        return BlogPostResource::collection(
            $this->blogPostRepository->all()
        );
    }


    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return BlogPostResource::make(
            $this->blogPostRepository->find($blogPost->id)
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
            //you can't use make on array UNLESS it is a collection 19:40 on the video
        return BlogPostResource::make(
            $this->blogPostRepository->create(
            BlogPostDto::fromRequest($request)
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, BlogPost $blogPost)
    {
        return BlogPostResource::make(
            $this->blogPostRepository->update(
            $blogPost->id,
            BlogPostDto::fromRequest($request)
        )); //->response()->setStatusCode(201)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        return $this->blogPostRepository->delete($blogPost->id);
    }
}
