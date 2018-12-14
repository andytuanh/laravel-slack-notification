<?php
/**
 * Slack Helper
 */
if (!function_exists('slack')) {
    function slack($webhook_url = null)
    {
        return \App\Services\Slack::make($webhook_url);
    }
}