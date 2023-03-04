<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLoginUpdateListener
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
    public function handle($event): void
    {
        If(isset($event->user) && $event->user instanceof User) {
            $event->user->Last_login_at = CarbonImmutable::now();
            $event->user->save();
        }
    }
}