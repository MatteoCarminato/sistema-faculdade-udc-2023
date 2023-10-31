<?php
namespace App\Repositories;

use App\Interfaces\RepositoryInterfaces;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all($searchTerm)
    {
        return $this->model->search($searchTerm)->orderBy('name')->paginate(10);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        dd($data);
        return $this->model->create($data);
    }

    public function update($dataModel, array $data)
    {
        $dataModel->update($data);
        return $dataModel;
    }

    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        return $model->delete();
    }
}