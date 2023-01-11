<?php
namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use App\Models\Ticket;
use App\Models\Rejection;
use App\Models\User;
use DB;

class AppMailer {
    protected $mailer; 
    protected $fromAddress = 'contact@avita-india.com';
    protected $fromName = 'Service Request | NEXSTGO South East Asia';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    //ticket information

    public function sendTicketInformation($user, Ticket $ticket)
    {
        //$this->to = $user->email;

        $number = DB::table('tickets')
        ->orderBy('created_at','desc')
        ->first();
      
        $num = sprintf('%03d', intval($number->no));


        $this->to = ['sandeep.rawat@ashplan.media'];
        $this->subject = "[SRN $ticket->job$num] $ticket->title";
        $this->view = 'emails.ticket_info';
        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }

    public function sendRejectionInformation($user, Rejection $rejection)
    {
        $ticket = Ticket::first();
        $number = DB::table('tickets')
        ->orderBy('created_at','desc')
        ->first();      
      
        $num = sprintf('%03d', intval($number->no));
        $this->to = ['sandeep.rawat@ashplan.media'];
        $this->subject = "[SRN $ticket->job$num] $ticket->title";
        $this->view = 'emails.rejection_info';
        $this->data = compact('user', 'rejection');
 
         return $this->deliver();

    }


 
}