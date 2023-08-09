<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

interface TeacherRepositoryInterface extends BaseServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository);
    
}