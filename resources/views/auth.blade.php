<html>

<head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <center>
        </head>

<body>
<form class="auth" method="post" action="/auth">
    @csrf
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" value="Submit">
</form>
</body>

</html>
