<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvent;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Get users
        /*
       $usermessages = Message::where('from', Auth::id())->orWhere('to', Auth::id())->get();
       $usersm = array();

       foreach ($usermessages as $msg){
           if($msg->from == Auth::id() ) $usersm[]=$msg->to;
           else $usersm[]=$msg->from;
       }
        $users = User::find($usersm);*/

        $users = DB::select("select users.id, users.name, users.picture, users.city, count(is_read) as unread
        from users JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.picture, users.city");

        return view('chat.chatindex', ['users' => $users]);

    }

    public function getMessage($user_id) {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('chat.message', ['messages' => $messages]);
    }


    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->save();

        $data = ['from' => $from, 'to' => $to];
        event(new ChatEvent($data));

    }
}
