<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Bitfumes\KarixNotificationChannel\KarixChannel;
use Bitfumes\KarixNotificationChannel\KarixMessage;  
use Illuminate\Support\Facades\Cache;

class otp extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $otp;

    public function __construct($otp)
    { 
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
       return [KarixChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toKarix($notifiable)
    {   
        $otp = $this->otp;
 
        return KarixMessage::create()
                        ->from('+91xxxxxxxxxx')
                        ->content('Your OTP is '.$otp);
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
