<?php

namespace App\Repositories;

use App\DataTransferObjects\BlogPostDto;
use stdClass;

interface BlogPostRepositoryInterface
{
    // all and find are already in the base repository so we don't need it here
    public function all(): array;
    public function find(int $id): stdClass; // Add the find method
    public function create(BlogPostDto $dto): stdClass;
    public function update(int $id, BlogPostDto $dto): stdClass;
    public function delete(int $id): bool;
}
