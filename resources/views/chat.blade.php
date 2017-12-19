@extends('layouts.app')

@section('css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </button>

                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                    Available
                                </li>

                                <li>
                                    <span class="glyphicon glyphicon-remove"></span>
                                    Busy
                                </li>

                                <li>
                                    <span class="glyphicon glyphicon-time"></span>
                                    Away
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <span class="glyphicon glyphicon-off"></span>
                                    Sign Out
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <ul class="chat">

                        </ul>
                    </div>

                    <div class="panel-footer">
                        <form id="send-message">
                            <div class="input-group">
                                <input id="message-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />

                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">Send</button>
                            </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <ul class="chatUsers">

                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>

    <script>
        jQuery(function($) {
            var $messageForm = $('#send-message');
            var $messageBox = $('#message-input');
            var $chat = $('ul.chat');
            var $chatUsers = $('ul.chatUsers');

            // open a socket connection
            var socket = new io.connect('http://pr0jectzer0.ml:3000', {
                'reconnection': true,
                'reconnectionDelay': 1000,
                'reconnectionDelayMax' : 5000,
                'reconnectionAttempts': 5
            });

            // when user connect, store the user id and name
            socket.on('connect', function (user) {
                socket.emit('join', {id: "1", name: "Frank"});
            });

        });
    </script>
@endsection