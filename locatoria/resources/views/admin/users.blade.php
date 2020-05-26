@extends('layouts.adminmenu')

@section('css')

    <link href="{{ asset('css/users.css') }}" rel="stylesheet">
    <style>

        .btn-label {position: relative;left: -12px;display: inline-block;padding: 6px 12px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;}
        .btn-labeled {padding-top: 0;padding-bottom: 0;}
        .btn { margin-bottom:10px; }

    </style>
@endsection


@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<br><br>
    <div style="margin-top: 1%; margin-left: 10%">
        <span><i class="fa fa-users fa-4x"></i></span>
        <h2 style="margin-left : 5%; margin-top : 1%;">Locatoria's users </h2>
    </div>
<hr>
<div class="container" style="margin-top : 6%; margin-left: 7%; width: 80%;">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                        <tr>
                            <th><span>User</span></th>
                            <th><span>Created</span></th>
                            <th class="text-center"><span>Status</span></th>
                            <th><span>Email</span></th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>

                        <script>
                            $(function() {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                            });
                        </script>

                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <img src="{{asset('/storage/'.$user->picture)}}" alt="">
                                    <a href="#" class="user-link">{{$user->name}}</a>
                                    <span class="user-subhead">{{$user->city}}</span>
                                </td>
                                <td>
                                    {{$user->created_at}}
                                </td>
                                <td class="text-center user{{$user->id}}">

                                {{--    here ajax will fetsh the status of the user   --}}
                                </td>
                                <td>
                                    <a href="#">{{$user->email}}</a>
                                </td>
                                <td class="{{"operations".$user->id}}" style="width: 20%;">

                                    <form method="post" id="comment_form{{$user->id}}">

                                        {{--    here ajax will fetsh the hidden input and the button to block or unblock the user   --}}

                                    </form>

                                </td>
                            </tr>

                            <script>
                                $(document).ready(function(){

                                    function load_unseen_notification{{$user->id}}(view = '{{$user->id}}')
                                    {
                                        $.ajax({
                                            url:'{{url("/useroperation")}}',
                                            method:"POST",
                                            data:{view:view},
                                            dataType:"json",
                                            success:function(data)
                                            {
                                                $('{{"#comment_form".$user->id}}').html(data.notification);
                                                $('.user{{$user->id}}').html(data.status);

                                            }
                                        });
                                    }


                                    $('#comment_form{{$user->id}}').on('submit', function(event){
                                        event.preventDefault();
                                        var form_data = $(this).serialize();
                                            $.ajax({
                                                url:'{{url("/userblockunblock")}}',
                                                method:"POST",
                                                data:form_data,
                                                success:function(data)
                                                {

                                                }
                                            });
                                    });

                                    load_unseen_notification{{$user->id}}({{$user->id}});

                                    setInterval(function(){
                                        load_unseen_notification{{$user->id}}({{$user->id}});
                                    }, 2000);

                                });



                            </script>


                        @empty
                            
                        @endforelse



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection