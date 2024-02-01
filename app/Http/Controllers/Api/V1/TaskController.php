<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TaskRequest;
use App\Http\Resources\Api\V1\TaskResource;
use App\Repositories\TaskRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $repository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $tasks = $this->repository->all();
        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): TaskResource
    {
        $task = $this->repository->create($request->validated());
        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): TaskResource
    {
        $task = $this->repository->find($id);
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id): TaskResource
    {
        $task = $this->repository->update($request->validated(), $id);
        return TaskResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        $this->repository->delete($id);
        return response()->noContent();
    }
}
