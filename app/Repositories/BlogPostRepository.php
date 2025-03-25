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
        // Shorter version of the code below
        //tap() here allows as to to retrive the model, then update it inside the tap() method and return the updated model
        //tap() is perfect for chaining methods and writing shorter code that are totally unreadable but look cool👌👌
        return (object) (tap($this->model->find($id))->update([
        'title' => $dto->title,
        'body' => $dto->body,
        'source' => $dto->source,
        'published_at' => $dto->publishedAt,
        ]))->toArray();

        // Longer version of the code above - MORE READABLE
        // $model = $this->model->find($id);

        // if (! $model) {
        //     throw new \Exception("Not Found");
        // }

        // $model = tap($model)->update([
        //     'title' => $dto->title,
        //     'body' => $dto->body,
        //     'source' => $dto->source,
        //     'published_at' => $dto->publishedAt,
        // ]);

        // return (object) $model->toArray();
    }
    public function delete(int $id): bool
    {
        $model = $this->model->find($id);

        if (! $model) {
            throw new \Exception("Not Found");
        }

        return $model->delete();
    }

}




//WHY USE tap() in update method to write the code shorter
// In the provided code, the tap() method is used to perform an operation on the retrieved model instance (in this case, updating it) while still returning the original model instance. The tap() function is a Laravel helper that allows you to "tap into" an object to perform some side effects (like calling a method or modifying it) without affecting the object itself.

// How tap() Works in This Context:
// Retrieve the Model:

// $this->model->find($id) retrieves the blog post model instance from the database using the provided id.
// Pass the Model to tap():

// The tap() function takes the retrieved model instance and allows you to perform an operation on it (in this case, calling the update() method).
// Perform the Update:

// Inside tap(), the update() method is called on the model instance. This updates the database record with the new values provided in the associative array.
// Return the Original Model:

// After the update() operation, tap() returns the original model instance (not the result of the update() method). This allows you to chain further operations on the model, such as calling toArray().
// Why Use tap() Here?
// The tap() method is used to make the code more concise by combining the retrieval of the model, the update operation, and the return of the updated model instance into a single expression. Without tap(), you would need to write these steps separately, as shown in the commented "longer version" of the code.

// Equivalent Code Without tap():
// The following code achieves the same result without using tap():
