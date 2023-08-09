<?php 

namespace App\Services;

use App\Interfaces\RepositoryInterfaces;

abstract class BaseService  
{
    protected $repository;

    public function __construct(RepositoryInterfaces $repository)
    {
        $this->repository = $repository;
    }

    public function all($searchTerm)
    {
        return $this->repository->all($searchTerm);
    }

    public function create($data)
    {
      return $this->repository->create($data);
    }

    public function update($dataModule, $validatedData)
    {
      return $this->repository->update($dataModule, $validatedData);
    }

}
