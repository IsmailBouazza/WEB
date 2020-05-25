@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
<!--  -->
@section('content')
    @include('inc.sidebar')


    <!-- sidebar-wrapper  -->
    <main class="page-content" >
        <div class="container-fluid">
            <h2>Messages</h2>
            <hr>
            <div class="row">

                <div class="col-md-4">
                    <div class="user-wrapper">
                        <ul class="users">
                            @foreach($users as $user)
                                <li class="user" id="{{ $user->id }}">
                                    @if($user->unread)
                                        <span class="pending">{{ $user->unread }}</span>
                                    @endif
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ $user->picture }}" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <p class="name"><b>{{ $user->name }}</b></p>
                                            <p class="email">{{ $user->city }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8" id="messages">
                    <div class="message-wrapper">


                        <div class="alert alert-primary text-center" style="margin: 30% ">
                            <strong>Start a conversation <i class="fas fa-comment-alt"></i></strong>
                        </div>
                    </div>

                </div>




                <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>


                    $(document).ready(function () {
                        //header
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var receiver_id = '';
                        var my_id = "{{ Auth::id() }}";


                        // Enable pusher logging - don't include this in production
                        Pusher.logToConsole = true;

                        var pusher = new Pusher('e6258d36f16b6c2294ce', {
                            cluster: 'eu'
                        });

                        var channel = pusher.subscribe('my-channel');
                        channel.bind('chat-event', function(data) {
                            //alert(JSON.stringify(data));
                            if (my_id == data.message.from) {
                                $('#' + data.message.to).click();
                            } else if (my_id == data.message.to) {
                                if (receiver_id == data.message.from) {
                                    // if receiver is selected, reload the selected user ...
                                    $('#' + data.message.from).click();
                                    // bring to top
                                    showInTop($('#' + data.message.from));
                                } else {
                                    // if receiver is not seleted, add notification for that user
                                    var pending = parseInt($('#' + data.message.from).find('.pending').html());
                                    if (pending) {
                                        $('#' + data.message.from).find('.pending').html(pending + 1);
                                    } else {
                                        $('#' + data.message.from).append('<span class="pending">1</span>');
                                    }
                                    // bring to top
                                    showInTop($('#' + data.message.from));
                                }
                            }
                        });

                        $('.user').click(function () {
                            $('.user').removeClass('activeuser');
                            $(this).addClass('activeuser');
                            $(this).find('.pending').remove();
                            receiver_id = $(this).attr('id');

                            $.ajax({
                                type: "get",
                                url: "chat/" + receiver_id, // need to create this route
                                data: "",
                                cache: false,
                                success: function (data) {
                                    $('#messages').html(data);
                                    scrollToBottomFunc();
                                }
                            });
                        });


                        $(document).on('keyup', '.input-text input', function (e) {
                            var message = $(this).val();
                            // check if enter key is pressed and message is not null also receiver is selected
                            if (e.keyCode == 13 && message != '' && receiver_id != '') {
                                $(this).val(''); // while pressed enter text box will be empty
                                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                                $.ajax({
                                    type: "post",
                                    url: "chat", // need to create this post route
                                    data: datastr,
                                    cache: false,
                                    success: function (data) {

                                    },
                                    error: function (jqXHR, status, err) {
                                    },
                                    complete: function () {
                                        scrollToBottomFunc();
                                    }
                                })
                            }


                        });

                        // make a function to scroll down auto
                        function scrollToBottomFunc() {
                            $('.message-wrapper').animate({
                                scrollTop: $('.message-wrapper').get(0).scrollHeight
                            }, 50);
                        }

                        // make a function to get user to the top
                        function showInTop(i){
                            i.hide();
                            i.show(600).parent().prepend(i);
                        }
                    });
                </script>
    @include('inc.jsSidebar')

@endsection
