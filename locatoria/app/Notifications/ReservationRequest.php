<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationRequest extends Notification
{
    use Queueable;

    public $reservation_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reser_id)
    {
        $this->reservation_id = $reser_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Reservation Request')
                    ->greeting("What's up ".$notifiable->name)
                    ->line('you\'re recieving a reservation request ')
                    ->line('click the button below to go to our web site.')
                    ->action('GO', url('/MyReservations'))
                    ->line('Thank you for using our application!');
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
            'reservation_id'=>$this->reservation_id,
        ];
    }
}
