<?php

namespace App\Services;

use App\Repositories\TeacherRepository;

class TeacherService extends BaseService
{
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        // $this->teacherRepository = $teacherRepository;
        parent::__construct($teacherRepository);
    }

}