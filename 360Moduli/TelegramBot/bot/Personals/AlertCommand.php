<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Longman\TelegramBot\Commands\UserCommands;

use GuzzleHttp\Psr7\Response;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\ReplyToMessage;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;

/**
 * User "/image" command
 *
 * Fetch any uploaded image from the Uploads path.
 */
class AlertCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'alert';

    /**
     * @var string
     */
    protected $description = 'Send message [giallo, arancio, rosso], [messaggio], [data]';

    /**
     * @var string
     */
    protected $usage = '/alerts';

    /**
     * @var string
     */
    protected $version = '1.0.0';

    protected $publish = [];
    protected $state;

    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function sql()
    {
        // Create connection
        $mysql_credentials = [
            'host' => 'localhost',
            'user' => 'acquial_comune2019',
            'password' => 'Com2019!!',
            'database' => 'acquial_telegram',
        ];
        $conn = new mysqli($mysql_credentials);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 'Connection failed';
        }

        return $conn;
    }

    public function execute()
    {   $this->state++;
        $message = $this->getMessage();
        $from = $message->getFrom();
        $user_id = $from->getId();
        $chat_id = $message->getChat()->getId();
        $message_id = $message->getMessageId();
        $state = true;
        Request::sendMessage([
            'chat_id' => $chat_id,
            'text' => 'Sistema di allertamento generale',
        ]);

        Request::sendMessage([
                'chat_id' => $chat_id,
                'text' => 'Seleziona un livello 1-Giallo, 2-Arancione, 3-Rosso',
            ]);
        Request::sendMessage(['chat_id' => $chat_id,
                'text' => "select level:".$this->state]);
        $con=$this->sql();
        $con->

        return true;
    }

    public function isAllowed($id)
    {   //Controlla la presenza degli id
        $allowed = ['96428886'];
        if (in_array($id, $allowed, true)) {
            return true;
        } else {
            return false;
        }
    }




}

?>

