<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\VirtualTrainingApplication;

class VirtualTrainingApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Application.
     *
     * @var \App\Models\VirtualTrainingApplication
     */
    public $application;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\VirtualTrainingApplication  $application
     * @return void
     */
    public function __construct(VirtualTrainingApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.course.virtual_training.application');
    }
}
