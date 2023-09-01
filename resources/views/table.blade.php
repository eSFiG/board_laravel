@extends('templates.app')

@section('title')
    {{ 'List of created tasks' }}
@endsection

@section('content')
    <table class="list">
        <caption>Created tasks</caption>
        <thead>
        <tr>
            <th width="40"><a href="?sort=t_id&dir='. self::$d .'">ID</a></th>
            <th width="250"><a href="?sort=title&dir='. self::$d .'">Title</a></th>
            <th width="80"><a href="?sort=priority&dir='. self::$d .'">Priority</a></th>
            <th width="50"><a href="?sort=t_name&dir='. self::$d .'">Type</a></th>
            <th width="100"><a href="?sort=owner_id&dir='. self::$d .'">Owner ID</a></th>
            <th width="100"><a href="?sort=assignee_id&dir='. self::$d .'">Assignee ID</a></th>
            <th width="80"><a href="?sort=status&dir='. self::$d .'">Status</a></th>
            <th width="150"><a href="?sort=created_at&dir='. self::$d .'">Created at</a></th>
        </tr>
        </thead>
        <tbody>
        @if ($tasks)
            @foreach($tasks as $task)
                <tr onclick="window.location='/task/{{ $task->id }}';" class="task">
                    <th>{{ $task->id }}</th>
                    <th align="left">{{ $task->title }}</th>
                    <th class="{{ $task->getColor("priority") }}">{{ ucfirst($task->priorities->name) }}</th>
                    <th class="{{ $task->getColor("type") }}">{{ ucfirst($task->types->name) }}</th>
                    <th>{{ $task->owner->login }}</th>
                    <th>{{ $task->assignee_id }}</th>
                    <th class="{{ $task->getColor("status") }}">{{ ucfirst($task->statuses->name) }}</th>
                    <th>{{ $task->created_at }}</th>
                </tr>
            @endforeach
        @else
            <p>There's no tasks, but you can always create some :D</p>
        @endif
        </tbody>
    </table>
    <a href="/task/create" class="button_input">Create</a>
    <a href="/logout" class="button_input">Log out</a>
@endsection
