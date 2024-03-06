<?php

namespace App\Jobs\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Events\Notification\NotificationEvent;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public string $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new NotificationEvent($this->data));
        Log::info($this->data);
        
    }
}
