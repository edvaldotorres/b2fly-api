<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model;

    public static function all(): Collection
    {
        return self::queryByUser()->orderBy('id', 'desc')->get();
    }

    public static function create(array $data): ?Model
    {
        $data['user_id'] = Auth::id();
        return self::loadModel()::query()->create($data);
    }

    public static function find(int $id): ?Model
    {
        return self::queryByUser()->findOrFail($id);
    }

    public static function update(array $data, int $id): ?Model
    {
        $model = self::find($id);
        if ($model) {
            $model->update($data);
        }
        return $model;
    }

    public static function delete(int $id): int
    {
        $model = self::find($id);
        return $model ? $model->delete() : 0;
    }

    private static function queryByUser(): object
    {
        return self::loadModel()::query()->where('user_id', Auth::id());
    }

    public static function loadModel(): Model
    {
        return app(static::$model);
    }
}
