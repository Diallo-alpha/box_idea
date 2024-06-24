<?php

namespace App\Notifications;

use App\Models\Idee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class IdeeStatusChanger extends Notification
{
    use Queueable;

    /**
     * The idee instance.
     *
     * @var \App\Models\Idee
     */
    protected $idee;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Idee $idee
     * @return void
     */
    public function __construct(Idee $idee)
    {
        $this->idee = $idee;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $statusMessage = $this->idee->status == 'accepté' ? 'Votre idée a été acceptée!' : 'Votre idée a été rejetée.';

        return (new MailMessage)
                    ->line('Le statut de votre idée a changé.')
                    ->line('Titre de l\'idée: ' . $this->idee->titre)
                    ->line($statusMessage)
                    ->line('Merci de votre contribution!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->idee->id,
            'status' => $this->idee->status,
        ];
    }
}
