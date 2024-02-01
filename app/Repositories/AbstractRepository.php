<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model;

    public static function all(): Collection
    {
        return self::loadModel()::all();
    }

    public static function create(array $data): ?Model
    {
        return self::loadModel()::query()->create($data);
    }

    public static function find(int $id): ?Model
    {
        return self::loadModel()::query()->findOrFail($id);
    }

    public static function update(array $data, int $id): ?Model
    {
        $model = self::loadModel()::query()->findOrFail($id);
        $model->update($data);
        return $model;
    }

    public static function delete(int $id): int
    {
        return self::loadModel()::query()->findOrFail($id)->delete();
    }

    public static function loadModel(): Model
    {
        return app(static::$model);
    }
}
