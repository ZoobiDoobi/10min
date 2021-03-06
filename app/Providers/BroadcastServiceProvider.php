<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes(['middleware' => ['web', 'auth:mailboxes']]);

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('emails.pipeline',  function () {
            if (true) { // Replace with real ACL
                return true;
            }
        });
    }
}
