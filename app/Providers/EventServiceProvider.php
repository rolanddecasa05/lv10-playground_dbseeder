<?php

namespace App\Providers;

use App\Events\Email\EmailNotification;
use App\Events\Notification\NotificationEvent;
use App\Listeners\EmailNotificationListener;
use App\Listeners\SendNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            // NotificationEvent::class,
            // EmailNotification::class,
        ],

        // NotificationEvent::class => [
        //     SendNotification::class
        // ],

        // EmailNotification::class => [
        //     EmailNotificationListener::class
        // ]
        
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
