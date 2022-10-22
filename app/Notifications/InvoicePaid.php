<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\OrderInstallment;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoicePaid extends Notification 
{
    use Queueable;
    private $OrderInstallment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(OrderInstallment $OrderInstallment) {
        //
        $this->OrderInstallment = $OrderInstallment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->greeting('Hello, ' . auth()->user()->name)
        ->subject('Invoice Payment Successfull')
        ->line('Course Name: ' . strip_tags($this->OrderInstallment->order->course->name))
        ->line('Installment No: ' . $this->OrderInstallment->installment)
        ->line('Transaction Id No: ' . $this->OrderInstallment->transaction_id)
        ->line('Pay Total: ' . $this->OrderInstallment->bdt)
        ->line('Status: Invoices has been paid!')
        ->line('Thank you for using our application! ' . config('app.name') . '.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
