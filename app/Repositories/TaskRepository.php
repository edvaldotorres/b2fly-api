<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends AbstractRepository
{
    protected static $model = Task::class;
}
