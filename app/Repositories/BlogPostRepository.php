<?php
namespace App\Repositories;

use App\DataTransferObjects\BlogPostDto;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{
    public function create(BlogPostDto $dto)
    {
        //use the dto class to create a new blog post
        return $this->model->create([
            'title' => $dto->title,
            'body' => $dto->body,
            'source' => $dto->source,
            'published_at' => $dto->publishedAt,
        ])->toArray();
    }
}
