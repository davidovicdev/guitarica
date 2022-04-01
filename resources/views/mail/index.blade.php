<!DOCTYPE html>
<html>

<head>
    <title>Guitarica.com</title>
</head>

<body>
    <h3>Thank you {{ $mail['name'] }}</h3>
    <h4>We have recieved your messaage and we will reply as soon as possible</h4>
    <br>
    <p>Title:</p>
    <p>{{ $mail['title'] }}</p>
    <p>Message:</p>
    <p>{{ $mail['message'] }}</p>

</body>

</html>