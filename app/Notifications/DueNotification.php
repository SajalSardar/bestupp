<?php

namespace App\Notifications;

use App\Models\OrderInstallment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DueNotification extends Notification implements ShouldQueue {
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
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->greeting('Hello, ' . $this->OrderInstallment->order->user->name)
            ->line('Course Name: ' . strip_tags($this->OrderInstallment->order->course->name))
            ->line('Installment No: ' . $this->OrderInstallment->installment)
            ->line('Pay Total: ' . $this->OrderInstallment->bdt)
            ->line('Pay Date: ' . $this->OrderInstallment->paydate->format('d M Y'))
            ->line('Please pay your installment.')
            ->action('Pay Installment', url('/login'))
            ->line('Thank you for using our application! ' . config('app.name') . '.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
