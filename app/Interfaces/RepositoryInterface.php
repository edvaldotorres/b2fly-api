<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function all(): Collection;

    public static function create(array $data): ?Model;

    public static function find(int $id): ?Model;

    public static function update(array $data, int $id): ?Model;

    public static function delete(int $id): int;

    public static function loadModel(): Model;
}
