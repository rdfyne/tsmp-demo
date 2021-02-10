<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ClassroomTrainingApplication;

class ClassroomTrainingApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Application.
     *
     * @var \App\Models\ClassroomTrainingApplication
     */
    public $application;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\ClassroomTrainingApplication  $application
     * @return void
     */
    public function __construct(ClassroomTrainingApplication $application)
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
        return $this->markdown('mail.course.classroom_training.application');
    }
}
