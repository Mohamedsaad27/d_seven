<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this
            ->subject('تأكيد الطلب رقم ' . $this->order->order_number)
            ->view('emails.order-confirmation')
            ->with([
                'order' => $this->order,
                'user' => $this->order->user,
                'orderItems' => $this->order->orderItems()->with(['product', 'color.color'])->get()
            ]);
    }
}
