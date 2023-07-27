<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService implements UserServiceInterface
{
    public function __construct(protected UserRepositoryInterface $userRepository) {
    }

    public function getAll(): Collection
    {
        return $this->userRepository->getAll();
    }

    public function getByUsername(string $username)
    {
        $username = $this->userRepository->getByUsername($username);

        if(!$username) {
            throw new ModelNotFoundException('User dengan username ' + $username + ' tidak ditemukan');
        }

        return $username;
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }
}
