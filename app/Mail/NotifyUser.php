<?php

namespace App\Mail;

use App\Models\LostItem;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyUser extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    public function __construct(LostItem $item)
    {
        $this->item = $item;
    }

    public function build()
    {
        return $this->subject('Your Lost Item Has Been Found!')
            ->view('emails.notify_user')
            ->with([
                'itemName' => $this->item->item_name,
                'location' => $this->item->location,
            ]);
    }

}
