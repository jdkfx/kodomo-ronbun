<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\UserDetail;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $display_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($display_name)
    {
        $this->display_name = $display_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.users.registered')
            ->text('emails.users.registered')
            ->subject('登録完了メール')
            ->with([
                'display_name' => $this->display_name,
            ]);
    }
}
