<?php

namespace App\Interfaces;

interface RepositoryInterfaces
{
    public function all($searchTerm);

    public function find($id);

    public function create(array $data);

    public function update($dataModel, array $data);

    public function delete($id);
}