<?php
namespace App\Events;

use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Str;

class NewNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $comment;
    public $user_name;
    public $post_id;
    public $data;
    public $time;

    public function __construct($data)
    {
        $this->user_id = $data['user_id'];
        $this->user_name = $data['user_name'];
        $this->comment = $data['comment'];
        $this->post_id = $data['post_id'];
        $this->date = date("Y-m-d", strtotime(Carbon::now()));
        $this->time = date("h:i A", strtotime(Carbon::now()));

    }

    public function broadcastOn()
    {
        //return new channel('new-notification')
        return ['new-notification'];
    }

}