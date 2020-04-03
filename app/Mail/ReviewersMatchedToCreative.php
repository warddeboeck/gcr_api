<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewersMatchedToCreative extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var User
     */
    public $creative;
    public $idea_uuid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $creative, String $idea_uuid)
    {
        $this->creative = $creative;
        $this->idea_uuid = $idea_uuid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->idea_uuid.'@globalcreativereview.com', '#GlobalCreativeReview idea '.$this->idea_uuid)
                ->subject('Welcome to the #GlobalCreativeReview')
                ->view('emails.reviewersmatchedtocreative');
    }
}
