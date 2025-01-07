<?php

namespace App\Listeners;

use App\Models\SessionTokens;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class CreateSessionToken
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
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $token = new SessionTokens();
        $token->user_id = $event->user->id;
        $token->token = Str::random(64);
        $token->otp = mt_rand(100000, 999999);
        $token->is_logged = 1;
        $token->save();
        session(['token' => $token->token]);
    }
}
