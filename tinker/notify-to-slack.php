<?php
use App\Models\Notify;
use App\Notifications\NotifyToSlackChannel;
(new Notify())->notify(new NotifyToSlackChannel());