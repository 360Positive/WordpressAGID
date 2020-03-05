<?php
/**
 * README
 * This configuration file is intended to run the bot with the webhook method.
 * Uncommented parameters must be filled
 *
 * Please note that if you open this file with your browser you'll get the "Input is empty!" Exception.
 * This is a normal behaviour because this address has to be reached only by the Telegram servers.
 */

// Load composer
use GuzzleHttp\Psr7\Response;
use mysql_xdevapi\Result;
use Longman\TelegramBot\Request;

require_once __DIR__ . '/vendor/autoload.php';

// Add you bot's API key and name
$bot_api_key = '912368249:AAFByCE2Qsz10VO9p3d5IBRHGUf7k9ATOWM';
$bot_username = '@Remoteallert_bot';

// Define all IDs of admin users in this array (leave as empty array if not used)
$admin_users = [ // 123,
];

// Define all paths for your custom commands in this array (leave as empty array if not used)
$commands_paths = [
    __DIR__ . '/Commands/',
    __DIR__ . '/Personals/'
];

// Enter your MySQL database credentials
$mysql_credentials = [
    'host' => 'localhost',
    'user' => 'acquial_comune2019',
    'password' => 'Com2019!!',
    'database' => 'acquial_telegram'
];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);

    // Add commands paths containing your custom commands
    $telegram->addCommandsPaths($commands_paths);

    // Enable admin users
    $telegram->enableAdmins($admin_users);

    // Requests Limiter (tries to prevent reaching Telegram API limits)
    $telegram->enableLimiter();

    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    // echo $e;
    // Log telegram errors
    Longman\TelegramBot\TelegramLog::error($e);
} catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
    // Silence is golden!
    // Uncomment this to catch log initialisation errors
    // echo $e;
}
