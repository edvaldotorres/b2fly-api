<?php

namespace Tests\Unit\Api\V1;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;

class TaskRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $taskRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Auth::login($this->user);
        $this->taskRepository = new TaskRepository();
    }

    public function test_all_tasks_for_user(): void
    {
        // Test to ensure all tasks for a user are correctly retrieved
        $tasks = Task::factory()->count(5)->create(['user_id' => $this->user->id]);
        $allTasks = $this->taskRepository->all();
        $this->assertEquals($tasks->count(), $allTasks->count(), "The count of tasks does not match.");
    }

    public function test_creates_a_task(): void
    {
        // Test to ensure a task is correctly created
        $taskData = Task::factory()->make()->toArray();
        $createdTask = $this->taskRepository->create($taskData);
        $this->assertModelData($taskData, $createdTask->toArray());
    }

    public function test_finds_a_task(): void
    {
        // Test to ensure a specific task can be found by ID
        $task = Task::factory()->create(['user_id' => $this->user->id]);
        $foundTask = $this->taskRepository->find($task->id);
        $this->assertModelData($task->toArray(), $foundTask->toArray());
    }

    public function test_updates_a_task(): void
    {
        // Test to ensure a task can be updated
        $task = Task::factory()->create(['user_id' => $this->user->id]);

        $taskData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'completed' => true
        ];

        $updatedTask = $this->taskRepository->update($taskData, $task->id);
        $this->assertModelData($taskData, $updatedTask->toArray());
    }

    public function test_deletes_a_task(): void
    {
        // Test to ensure a task can be deleted
        $task = Task::factory()->create(['user_id' => $this->user->id]);
        $this->taskRepository->delete($task->id);
        $this->assertNull(Task::find($task->id), "The task should be deleted but was found.");
    }

    protected function assertModelData(array $expected, array $actual): void
    {
        foreach ($expected as $key => $value) {
            $this->assertEquals($value, $actual[$key], "The {$key} of the task does not match.");
        }
    }
}
