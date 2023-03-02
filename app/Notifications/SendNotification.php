<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;
class SendNotification extends Notification
{
   use Queueable;
   private $user;
   public function __construct($user)
   {
      $this->user = $user;
   }
   public function via($notifiable)
   {
      return ['slack'];
   }
   public function toSlack($notifiable)
   {
    $url = url('/invoices/'.'teste');
 
    return (new SlackMessage)
                ->success()
                ->content('One of your invoices has been paid!')
                ->attachment(function ($attachment) use ($url) {
                    $attachment->title('Invoice 1322', $url)
                               ->fields([
                                    'Title' => 'Server Expenses',
                                    'Amount' => '$1,234',
                                    'Via' => 'American Express',
                                    'Was Overdue' => ':-1:',
                                ]);
                });
   }
}