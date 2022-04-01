<!DOCTYPE html>
<html>

<head>
    <title>Guitarica.com</title>
</head>

<body>
    <h3>You received a message from {{ $mail['name'] }} !</h3>
    <br>
    <p>Email:</p>
    <p>{{ $mail["email"]}}</p>
    <p>Title:</p>
    <p>{{ $mail['title'] }}</p>
    <p>Message:</p>
    <p>{{ $mail['message'] }}</p>

</body>

</html>