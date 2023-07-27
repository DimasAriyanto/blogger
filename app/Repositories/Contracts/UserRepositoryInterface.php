<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(): Collection;

    public function getByUsername(string $username);

    public function create(array $data);
}
