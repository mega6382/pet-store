<?php
declare(strict_types=1);


namespace PetStore\Infrastructure\Notifier;


use PetStore\Application\Notification\Message;
use PetStore\Application\Notification\NotifierInterface;

class WebNotifier implements NotifierInterface
{

    /**
     * WE will send the message back to be sent to the web via the Response object
     * @param Message $message
     * @return Message
     */
    public function notify(Message $message): Message
    {
        return $message;
    }
}