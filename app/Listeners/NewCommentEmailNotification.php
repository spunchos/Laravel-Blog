<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use App\Mail\NewCommentListener;
use Illuminate\Support\Facades\Mail;

class NewCommentEmailNotification
{
    /**
     * @var CommentCreated
     */
    public $event;

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $this->event = $event;

        Mail::to("spunchosss@mail.ru")->send(new NewCommentListener($event->comment->text));
    }
}
