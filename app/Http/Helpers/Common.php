<?php

namespace App\Http\Helpers;

use App\Providers\FCMService;
use Illuminate\Support\Facades\Session as FacadesSession;

class Common 
{
    public function one_time_message($class, $message)
    {
        if ($class == 'error') $class = 'danger';
        FacadesSession::flash('alert-class', 'alert-' . $class);
        FacadesSession::flash('message', $message);
        FacadesSession::flash('error', $message);
    }

    function sendPushNotification($token, $body, $data = null)
    {

        $title = 'SAAM';

        FCMService::send(
            $token,
            [
                'title' => $title,
                'body' => $body,
                // "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                // 'sound' => "cute_notification.mp3",
                // "alert" => "New",
            ],
            $data
        );
    }


}