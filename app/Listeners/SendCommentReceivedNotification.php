<?php

namespace App\Listeners;


use App\Events\CommentReceived;
use Illuminate\Support\Facades\Mail;
//use App\Mail\CommentRecievedMail;
//use Illuminate\Contracts\Mail\Mailable as CommentRecievedMail ;
//use Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Monolog\Handler\MailHandler;
use Illuminate\Mail\Mailer;

class SendCommentReceivedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentReceived  $event
     * @return void
     */
    public function handle(CommentReceived $event)
    {
        //    
        //*\Mail::to($event->comment->user->email)->send(
            //new CommentRecievedMail($event->comment));*/
        $mailid = $event->blog->user->email;
        $subject = 'Comment Received.';
        $data = array('email' => $mailid, 'subject' => $subject);
        \Mail::send('emails.comment-received', $data, function ($message) use ($data) {
        $message->from('BlogApp@gmail.com', 'Blog Application');
        $message->to($data['email']);
        $message->subject($data['subject']); 
        });       
    }
}
