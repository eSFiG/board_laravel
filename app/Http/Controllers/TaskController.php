<?php


namespace App\Http\Controllers;


use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {

    public function list() {
        $tasks = Task::where('active', 1)->get();
        return view('table', ['tasks' => $tasks]);
    }

    public function create() {
        return view('task/create');
    }

    public function save(TaskRequest $request) {
        $data = $request->validated();
        $data['owner_id'] = Auth::id();
        $task = new Task();
        $task->fill($data)->save();
        return redirect('/');
    }

    public function update(TaskRequest $request, Task $id) {
        $data = $request->validated();
        $id->fill($data)->save();
        return redirect('/task/'.$id->id);
    }

    public function info(Task $id) {
        return view('task/view', ['task' => $id, 'comments' => $id->comments]);
    }

    public function status(Task $id, Request $request) {
        $id->update(['status' => $request->status]);
        return redirect('/task/'.$id->id);
    }

    public function edit(Task $id) {
        return view('task/edit', ['task' => $id]);
    }

    public function delete(Task $id) {
        $id->active = 0;
        $id->save();
        return redirect('/');
    }
}
