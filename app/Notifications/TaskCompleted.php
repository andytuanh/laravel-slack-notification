<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class TodoCompleted extends Notification implements ShouldQueue
{
    use Queueable;
	
	private $task;
     /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
    }
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
	
	public function toSlack($notifiable)
	{
		$task = $this->task;
        return (new SlackMessage)
            ->success()
            ->content("A task has been completed")
            ->attachment(function ($attachment) use ($task) {
                $attachment->title($task->title, route('task', $task->id))
                    ->content($task->description);
            });
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
            'title' => $this->task->title,
            'description' => $this->task->description
        ];
    }
	
	public function via($notifiable)
	{
		//via method is used to determine what notification channel to use
		//return $notifiable->prefers_sms ? ['nexmo'] : ['mail'];
        return ['stt-dkkb'];
	}
}
