<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $reminderMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reminderMessage)
    {
        $this->reminderMessage = $reminderMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // You can customize the email view and subject here
        return $this->view('emails.appointment_reminder')
            ->subject('Appointment Reminder');
    }
}
