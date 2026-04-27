<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;
    public $user;
    public $orderDetails;

    public function __construct($pdf, $user,$orderDetails)
    {
        $this->pdf = $pdf;
        $this->user = $user;
        $this->orderDetails = $orderDetails;
    }

    public function build()
    {
        return $this->view('emails/invoice_body') // ✅ Simple email body
            ->with([
                'user' => $this->user
            ])
            ->attachData($this->pdf, 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);
    }

}


