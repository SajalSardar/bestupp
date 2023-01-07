<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email = $event->email;
        $token = $event->token;
        Mail::send('email.reset-password', compact('token', 'email'), function ($message) use($email){
            $message->from('noreply@reply.com', config('app.name'))
                    ->to($email)
                    ->subject('Reset-password');
            });
    }
}
