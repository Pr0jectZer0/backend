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
    //instantiate a Pusher object with our Credential's key
    var pusher = new Pusher('60b89a1e182fd4635842', {
        cluster: 'eu',
        encrypted: true,
        authEndpoint: 'https://pr0jectzer0.ml/broadcasting/auth',
        auth: {
            headers: {
                'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHBzOi8vcHIwamVjdHplcjAubWwvYXBpL3VzZXIvbG9naW4iLCJpYXQiOjE1MTM2ODgwNzEsImV4cCI6MTUxMzY5MTY3MSwibmJmIjoxNTEzNjg4MDcxLCJqdGkiOiJXQlJjZkdWcmVsZHZjMXE1In0.jiRlAAVAGs2OiXCXc0MStUoAywUYffbpHWlxgXHZ6qc'
            }
        }
    });

    //Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('https://pr0jectzer0.ml/private-chat.2');

    //Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\MessageSent', addMessage);

    function addMessage() {
       alert("New Message send!")
    }
</script>
</body>
</html>