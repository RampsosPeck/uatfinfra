<?php

namespace Uatfinfra\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Uatfinfra\Mail\PleaseActivateYourAccount;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivationLink
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::to($event->user->email)->queue(new PleaseActivateYourAccount($event->user));
    }
}
