<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\UserSubscribedMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOwnerAboutSubscription
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        DB::table('newsletter')->insert([
            'email'=>'$event->email'
        ]);

        Mail::to($event->email)->send(new UserSubscribedMessage);
    }
}
