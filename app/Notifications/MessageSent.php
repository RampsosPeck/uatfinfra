<?php

namespace Uatfinfra\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MessageSent extends Notification
{
    protected $message;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->greeting($notifiable->name.',')
                    ->subject('Mensaje recibido desde el WEB SITE DE Infraestructura U.A.T.F.')
                    ->line('Has recibido un mensaje.')
                    ->action('Click aquí para ver el mensaje', route('messages.show', $this->message->id))
                    ->line('Gracias por utilizar nuestra aplicación...!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    { 
        //return $this->message->toArray();
        return [
            'link' => route('messages.show', $this->message->id),
            'text' => "Has recibido un mensaje de ".$this->message->name
        ];
    }
}
