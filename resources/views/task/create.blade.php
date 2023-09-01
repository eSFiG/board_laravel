<html>
<head>
    <meta charset="utf-8">
    <title>Creating task</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <form class="task_form" method="post" action="/task/save">
    @csrf <!-- {{ csrf_field() }} -->
        <div class="cell">Title:
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="cell">Description: <br />
            <textarea name="description" rows="15" cols="70" placeholder="Description"></textarea>
        </div>
        <div class="cell">Priority:
            <select name="priority" >
                <option value=1>Low</option>
                <option value=2>Medium</option>
                <option selected value=3>High</option>
                <option value=4>Highest</option>
            </select>
        </div>
        <div class="cell">Type:
            <select name="type">
                <option value=1>Bug</option>
                <option selected value=2>Task</option>
                <option value=3>Story</option>
            </select>
        </div>
        <div class="cell">Assignee:
            <input type="text" name="assignee_id" placeholder="Assignee ID">
        </div>
        <div class="middle">
            <input type="submit" value="Create task" class="button_input">
        </div>
    </form>
    <a class="button" href="/">Back</a>
</div>
</body>
</html>
