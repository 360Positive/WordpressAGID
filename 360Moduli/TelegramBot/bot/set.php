<?php
/**
 * README
 * This file is intended to set the webhook.
 * Uncommented parameters must be filled
 */

// Load composer
require_once __DIR__ . '/vendor/autoload.php';

// Add you bot's API key and name
$bot_api_key  = '912368249:AAFByCE2Qsz10VO9p3d5IBRHGUf7k9ATOWM';
$bot_username = '@Remoteallert_bot';

// Define the URL to your hook1.php file
$hook_url     = 'https://comune.acquiterme.al.it/sviluppo/wp-content/themes/design-italia-child/360Moduli/TelegramBot/bot/hook1.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Set webhook
    $result = $telegram->setWebhook($hook_url);

    // To use a self-signed certificate, use this line instead
    //$result = $telegram->setWebhook($hook_url, ['certificate' => $certificate_path]);

    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e->getMessage();
}
