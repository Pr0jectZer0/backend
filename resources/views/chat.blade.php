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
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHBzOi8vcHIwamVjdHplcjAubWwvYXBpL3VzZXIvbG9naW4iLCJpYXQiOjE1MTM2OTM3OTIsImV4cCI6MTUxMzY5NzM5MiwibmJmIjoxNTEzNjkzNzkyLCJqdGkiOiJMeWs0OENUazhYdEJkcmZqIn0.lk1MQWMD3bifzGCLzwWTYxYTi8s4Xj7frVk4LoGmzdc'
            }
        }
    });

    var channel = pusher.subscribe('private-chat.1');

    channel.bind('App\\Events\\MessageSent', function(data) {
        alert(data.message); //Neue Nachricht bekommen
    });
</script>
</body>
</html>