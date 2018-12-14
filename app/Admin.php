<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
class Admin extends Model
{
    // Import Notifiable Trait
    use Notifiable;
    // Specify Slack Webhook URL to route notifications to 
    public function routeNotificationForSlack() {
        //return $this->slack_webhook_url;
		return env('SLACK_WEBHOOK_URL');
    }
}