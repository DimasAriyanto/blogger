<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserServiceInterface
{
    public function getAll(): Collection;

    public function getByUsername(string $username);

    public function create(array $data);
}
