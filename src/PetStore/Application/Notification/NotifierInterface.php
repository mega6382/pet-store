<?php
declare(strict_types=1);


namespace PetStore\Application\Notification;


interface NotifierInterface
{
    public function notify(Message $message);
}