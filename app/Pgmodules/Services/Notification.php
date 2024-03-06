<?php

namespace App\Pgmodules\Services;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Jobs\Notification\NotificationJob;
use App\Events\Notification\NotificationEvent;
use App\Jobs\Email\SendMailJob;

class Notification {
    public function send(object $data): void {
        NotificationJob::dispatch($data['message'])
                    ->delay(now()->addMinutes(1));
    }

    public function sendEmail(object $data) {
        SendMailJob::dispatch($data['email']);
        
    }
}