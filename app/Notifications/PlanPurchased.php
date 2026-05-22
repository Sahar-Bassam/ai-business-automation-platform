<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class PlanPurchased extends Notification
{
    protected $planTitle;

    public function __construct($planTitle)
    {
        $this->planTitle = $planTitle;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Plan {$this->planTitle} has been purchased successfully",
        ];
    }
}
