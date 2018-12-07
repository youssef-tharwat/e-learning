<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VideoCalls extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $userId = null;
    public $sessionID = null;

    public function __construct($_id, $_sID)
    {

        $this->userId  = $_id;
        $this->sessionID = $_sID;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {

        return [
            'toUserID' => $this->userId,
            'sessionID' => $this->sessionID,
            'repliedTime' =>Carbon::now()
        ];
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
