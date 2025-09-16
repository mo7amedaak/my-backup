<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationStatusNotification extends Notification
{
    use Queueable;

    protected $status;
    protected $jobTitle;

    public function __construct($status, $jobTitle)
    {
        $this->status = $status;
        $this->jobTitle = $jobTitle;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Your application for '{$this->jobTitle}' has been {$this->status}",
        ];
    }
}
