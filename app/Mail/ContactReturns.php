<?php

namespace App\Mail;


use App\Entities\OrderNotes;
use App\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactReturns extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * @var User
     */
    public $user;
    /**
     * @var OrderNotes
     */
    public $orderNotes;


    public function __construct(OrderNotes $orderNotes, User $user)
    {


        $this->user = $user;
        $this->orderNotes = $orderNotes;
    }



    public function build()
    {
        return $this->markdown('emails.contact-returns');
    }
}
