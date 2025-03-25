<?php
namespace App\Repositories;

use App\DataTransferObjects\BlogPostDto;
use App\Models\BlogPost;
use stdClass;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{
    public function __construct(BlogPost $blogPost)
    {
        parent::__construct($blogPost);
    }

    //all and find are already in the base repository so we don't need it here

    public function create(BlogPostDto $dto): stdClass
    {
        //use the dto class to create a new blog post
        return (object) $this->model->create([
            'title' => $dto->title,
            'body' => $dto->body,
            'source' => $dto->source,
            'published_at' => $dto->publishedAt,
        ])->toArray();
    }

    public function update(int $id, BlogPostDto $dto): stdClass
    {
        return (object) (tap($this->model->find($id))->update([
        'title' => $dto->title,
        'body' => $dto->body,
        'source' => $dto->source,
        'published_at' => $dto->publishedAt,
        ]))->toArray();
    }
    public function delete(int $id): stdClass
    {

    }

}
