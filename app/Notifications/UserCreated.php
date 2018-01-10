<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserCreated extends Notification implements ShouldQueue
{
    use Queueable;

    //public $delay = 60;

    public $token, $user;

    /**
     * Create a new notification instance.
     *
     * @param $token
     * @param $user
     */
    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->replyTo('your@email.com', 'YourName')
            ->subject("Your user account has been created.")
            ->greeting("Hi {$this->user->name}")
            ->line('You are receiving this email because an account was created on SomeName')
            ->line('To start using the portal kindly verify and reset your password. Your login email is "'.$this->user->email.'"')
            ->action('Verify & Reset Password', url(route('user.verification', $this->token, false)))
            ->line('If you did not request an account creation, kindly reply to some@email.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
