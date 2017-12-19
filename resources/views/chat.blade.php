<!DOCTYPE html>
<html>
<head>
    <title>Talking with Pusher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="content">
        <h1>Laravel 5 and Pusher is fun!</h1>
        <ul id="messages" class="list-group">
        </ul>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/3.1/pusher.min.js"></script>
<script>
    var pusher = new Pusher('60b89a1e182fd4635842', {
        cluster: 'eu',
        encrypted: true,
        authEndpoint: 'https://pr0jectzer0.ml/broadcasting/auth',
        host: 'https://pr0jectzer0.ml',
        auth: {
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHBzOi8vcHIwamVjdHplcjAubWwvYXBpL3VzZXIvbG9naW4iLCJpYXQiOjE1MTM3MDA0NjgsImV4cCI6MTUxMzcwNDA2OCwibmJmIjoxNTEzNzAwNDY4LCJqdGkiOiJzQzVETnlnaU53WUFCQzU3In0._8BNjkUywC9wigJEEUPozEU7A5OIb9rK065MamxoH8I'
            }
        }
    });

    var channel = pusher.subscribe('private-chat.1');

    channel.bind('App\\Events\\MessageSent', function(data) {
        alert("Neue Nachricht erhalten");
        console.log(data); //Neue Nachricht bekommen
    });
</script>
</body>
</html>