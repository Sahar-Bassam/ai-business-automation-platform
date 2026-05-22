<?php

namespace App\Providers;

use App\Events\UserSubscribed;
use App\Listeners\EmailOwnerAboutSubscription;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserSubscribed::class => [
            EmailOwnerAboutSubscription::class,
        ],
    ];

    public function boot(): void
    {
        //
    }
}
