<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this
            ->subject('تأكيد الطلب رقم ' . $this->order->order_number)
            ->view('emails.order-created')
            ->with([
                'order' => $this->order,
                'user' => $this->order->user,
                'orderItems' => $this->order->orderItems()->with(['product', 'color.color'])->get()
            ]);
    }
}
