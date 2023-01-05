<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $code;
    protected $token;

    public function __construct($code, $token)
    {
        $this->code = $code;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reset_password_route = env('RESET_PASSWORD_URL');
        return $this->view('emails.resetPassword')
            ->subject('Mail Đổi Mật Khẩu')
            ->with(['reset_password_url' => $reset_password_route, 'code' => $this->code]);
    }
}

