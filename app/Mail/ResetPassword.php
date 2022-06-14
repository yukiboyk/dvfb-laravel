<?php

namespace App\Mail;

use App\Models\PasswordReset;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    protected $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/Auth/reset-password/'.$this->token);
        return $this
        ->subject('ĐẶT LẠI MẬT KHẨU')
        // ->view('email.reset-pw')
        ->markdown('email.reset-pw', [
            'url' => $url,
        ]);
    }
}
