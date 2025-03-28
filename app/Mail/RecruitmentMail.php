<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecruitmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recruitmentDetails;
    public $officerName;

    /**
     * Create a new message instance.
     */
    public function __construct($recruitmentDetails, $officerName)
    {
        $this->recruitmentDetails = $recruitmentDetails;
        $this->officerName = $officerName;
    }

    /**
     * Build the message.
     */
    public function build()
{
    return $this->subject('Campus Recruitment Alert')
                ->view('emails.recruitment')
                ->with([
                    'recruitmentDetails' => $this->recruitmentDetails,
                    'officerName' => $this->officerName, // Pass officer name
                ]);
}

}
