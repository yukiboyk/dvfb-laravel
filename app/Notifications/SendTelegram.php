<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;
/**
     * lib : https://github.com/laravel-notification-channels/telegram.
     */
class SendTelegram extends Notification
{
    use Queueable;
    protected $username;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($username)
    {
      $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["telegram"];
    }

    public function toTelegram($notifiable)
    {
        $url = "https://lemanh.net";
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to(env('TELEGRAM_CHAT_ID'))
            // Markdown supported.
            ->content("Vua co thanh vien dang ki ".$this->username)
            // (Optional) Blade template for the content.
            // ->view('notification', ['url' => $url])

            // (Optional) Inline Buttons
            ->button('View Panel', $url);
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
