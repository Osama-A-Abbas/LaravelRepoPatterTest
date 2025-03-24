<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{

    //any methods defined here must be implemented by the class that uses this interface, the BaseRepository
    //NOTE: You must also determine the parameters here

    public function find(int $id);

    
    // public function create(array $data);
}
