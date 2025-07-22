<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class BookBorrowed extends Notification
{
    protected $book;

    public function __construct($book, $user)
    {
        $this->book = $book;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['database']; // you can add 'mail' too if needed
    }

    public function toArray($notifiable)
    {
        return [
            
            'message' => "{$this->user->name} borrowed : {$this->book->name}",
        ];
    }
}
