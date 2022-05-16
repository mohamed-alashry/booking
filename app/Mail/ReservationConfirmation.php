<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Reservation Confirmation")
            ->markdown('emails.reservation_confirmation', [
                'greeting' => 'Hi,',
                'title' => $this->reservation->guest_name,
                'body' =>  'You have a reservation for room: ' . $this->reservation->room->name,
                'thanks' => 'Thank you!',
            ]);
    }
}
