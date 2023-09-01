@extends('templates.app')

@section('title')
    {{ 'Full info' }}
@endsection

@section('content')
    @if(!$task->active)
        <p class="warning">This task has been deleted</p>
    @endif
    <table class="info">
        <caption>Full info about task №{{ $task->id }} (created by {{ $task->owner->login }})</caption>
        <tr>
            <th width="400" height="40">Title:</th>
            <th width="100" height="40">Status:</th>
            <th width="100" height="40">Assignee to:</th>
        </tr>
        <tr>
            <th height="60">{{ $task->title }}</th>
            <th height="60">
                <form method="post" action="/task/status/{{ $task->id }}">
                    @csrf
                    <select {{ $task->active != 1 ? 'disabled' : '' }} name="status">
                        <option {{ $task->statuses->name == 'open' ? 'selected' : '' }} value=1>Open</option>
                        <option {{ $task->statuses->name == 'in progress' ? 'selected' : '' }} value=2>In progress</option>
                        <option {{ $task->statuses->name == 'finished' ? 'selected' : '' }} value=3>Finished</option>
                    </select>
                    @if($task->active)
                        <input type="submit" name="set" value="Set">
                    @endif
                </form>
            <th height="60">{{ $task->assignee_id }}</th>
        </tr>
        <tr>
            <th colspan = "3" height="40">Description:</th>
        </tr>
        <tr align="justify">
            <th colspan="3" height="200" style="white-space: pre-wrap">{{ $task->description }}</th>
        </tr>
        <tr>
            <th height="40">Priority:</th>
            <th height="40" colspan="2">Type:</th>
        </tr>
        <tr>
            <th height="40">{{ ucfirst($task->priorities->name) }}</th>
            <th height="40" colspan="2">{{ ucfirst($task->types->name) }}</th>
        </tr>
        <tr>
            <th colspan = "3" height="40">Created at: {{ $task->created_at }}</th>
        </tr>
    </table>
    @if($task->link)
        <a class="button" href="{{ $task->link }}">PR link</a>
    @endif
    @if($task->active)
        <a class="button" href="/task/edit/{{ $task->id }}">Edit</a>
        <a class="button" href="/task/delete/{{ $task->id }}">Delete</a>
    @endif
    @if($comments)
        @foreach ($comments as $comment)
            <div class="comment">
                <div class="comment__info">
                    <div>{{ $comment->owner->login }}</div>
                    <div>{{ $comment->created_at }}</div>
                </div>
                <div class="comment__text">{{ $comment->text }}</div>
                @if($task->active)
                    <div class="comment__button">
                        <a href="/comment/delete/{{ $comment->id }}">Delete</a>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
    @if($task->active)
        <form class="info" method="post" action="/comment/save/{{ $task->id }}"><br>
            @csrf
            <div class="cell">Comment:<br />
                <textarea name="text" rows="10" cols="76"></textarea>
            </div>
            <div class="middle">
                <input type="submit" value="Add" class="button_input">
            </div>
        </form>
    @endif
    <a class="button" href="/">Back</a>
@endsection
