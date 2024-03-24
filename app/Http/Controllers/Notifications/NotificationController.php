<?php

namespace App\Http\Controllers\Notifications;


use Illuminate\Queue\Queue;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Pgmodules\Services\Notification;
use App\Events\Notification\NotificationEvent;

class NotificationController extends Controller
{
    public function __construct()
    {
        
    }
    public function send(Request $request) {
        
        $notif = new Notification;
        try {
            return response()->json([
                'message' => $notif->send($request)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th
            ], 422);
        }
        
    }

    public function sendEmail(Request $request) {
        //Log::info('email controller');
        $notif = new Notification;

        return $notif->sendEmail($request);
    }
}
