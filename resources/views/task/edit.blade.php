@extends('templates.app')

@section('title')
    {{ 'Editing task №'.$task->id }}
@endsection

@section('content')
    <form class="task_form" method="post" action="/task/update/{{ $task->id }}">
        @csrf
        <div class="cell">Title:
            <input type="text" name="title" value="{{ $task->title }}">
        </div>
        <div class="cell">Description: <br />
            <textarea name="description" rows="15" cols="70">{{ $task->description }}</textarea>
        </div>
        <div class="cell">Priority:
            <select name="priority">
                <option {{ ($task->priorities->name == "low" ? "selected" : "") }} value=1>Low</option>
                <option {{ ($task->priorities->name == "medium" ? "selected" : "") }} value=2>Medium</option>
                <option {{ ($task->priorities->name == "high" ? "selected" : "") }} value=3>High</option>
                <option {{ ($task->priorities->name == "highest" ? "selected" : "") }} value=4>Highest</option>
            </select>
        </div>
        <div class="cell">Task Type:
            <select name="type">
                <option {{ ($task->types->name == "bug" ? "selected" : "") }} value=1>Bug</option>
                <option {{ ($task->types->name == "task" ? "selected" : "") }} value=2>Task</option>
                <option {{ ($task->types->name == "story" ? "selected" : "") }} value=3>Story</option>
            </select>
        </div>
        <div class="cell">Assignee:
            <input type="text" name="assignee_id" value="{{ $task->assignee_id }}">
        </div>
        <div class="cell">PR link:
            <input type="text" name="link" value={{ $task->link }}>
        </div>
        <div class="middle">
            <input type="submit" name="update" value="Update" class="button_input">
        </div>
    </form>
    <a class="button" href="/task/{{ $task->id }}">Back</a>
@endsection
