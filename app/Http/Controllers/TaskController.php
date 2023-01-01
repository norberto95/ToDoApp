<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TaskController extends Controller
{   

        
    /**
     * Show all tasks.
     *
     * @return void
     */
    public function index() {
        $activeTasks =  Task::where('status', Task::getStatus('Active'))->orderBy('created_at', 'DESC')->get();
        $completedTasks = Task::where('status', Task::getStatus('Completed'))->orderBy('created_at', 'DESC')->get();

        return view('tasks.index', [
            'activeTasks' => $activeTasks,
            'completedTasks' => $completedTasks
        ]);
    }


        
    /**
     * Show add task form.
     *
     * @return void
     */
    public function add() {
        return view('tasks.add', [
            'defaultStatus' => Task::getStatus('Active')
        ]);
    }


        
    /**
     * Store new task.
     *
     * @return void
     */
    public function store(StoreTaskRequest $request) {
        return redirect(
            route(
                'tasks.show', 
                ['task' => Task::create($request->validated())])
        );
    }


        
    /**
     * Show single task details.
     *
     * @param  mixed $task
     * @return void
     */
    public function show(Task $task) {
        return view('tasks.show', [
            'task' => $task
        ]);
    }

        
    /**
     * Show edit task form.
     *
     * @param  mixed $task
     * @return void
     */
     public function edit(Task $task) {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }


    
    /**
     * Update task.
     *
     * @param  mixed $task
     * @return void
     */
    public function update(UpdateTaskRequest $request, Task $task) {
        if($task->update($request->validated())){
            Session::flash('status', [
                'success' => true,
                'message' => 'Twoje zadanie zostało zaaktualizowane.'
            ]);
        } else {
            Session::flash('status', [
                'success' => false,
                'message' => 'Wystąpił błąd przy aktualizacji zadania.'
            ]);
        }

        return redirect(
            route(
                'tasks.show', 
                ['task' => $task])
        );
    }


        
    /**
     * Delete task.
     *
     * @param  mixed $task
     * @return void
     */
    public function delete(Request $request, Task $task) {
        if($task->delete()){
            Session::flash('status', [
                'success' => true,
                'message' => 'Twoje zadanie zostało usunięte.'
            ]);
        } else {
            Session::flash('status', [
                'success' => false,
                'message' => 'Wystąpił błąd przy usuwaniu zadania.'
            ]);
        }

        return redirect(
            route('tasks.index')
        );
}
}
