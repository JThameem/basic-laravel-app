<?php

namespace App\Listeners;

use App\Events\LoginHistory;
use App\Models\LoginHistory as LoginHistoryModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveLoginHistory implements ShouldQueue
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
     * @param  \App\Events\LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        $data = [
            'username' => @$event->user->email,
            'password' => @$event->user->password,
            'ip' => @$event->ip,
        ];
        LoginHistoryModel::insertRecord($data);
    }
}
