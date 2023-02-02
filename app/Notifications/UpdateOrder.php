<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateOrder extends Notification
{
    use Queueable;

    protected  $info;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        //
        $this->info = $info;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'database',
            'mail',
            'broadcast',
        ];
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
            ->line(__('mail.Himpies forever'))
            ->line(__('mail.Your order status has been changed').__('mail.'.$this->info->status))
            ->line(__('mail.Order id : ').$this->info->order->id)
            ->line(__('mail.Mobile : ').$this->info->order->userAddress->mobile)
            ->action(__('mail.Track your order'), route('trackOrder.show',['mobile' => $this->info->order->mobile,'order_id' => $this->info->order->id ]))
            ->line(__('thanks for your purchase'));
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
            // notification fileds
            'user' => $notifiable,
            'info' => $this->info->load('order')
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        $n = $notifiable->notifications()->latest()->first();
        $n['date'] = translateDate($n->created_at);

        return new BroadcastMessage([
            'notification' => $n
        ]);
    }
}
