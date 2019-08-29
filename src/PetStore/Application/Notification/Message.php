<?php
declare(strict_types=1);


namespace PetStore\Application\Notification;

use JsonSerializable;

class Message implements JsonSerializable
{
    /**
     * @var string
     */
    protected $formattedMessage;

    /**
     * @var string
     */
    protected $plainMessage;

    /**
     * Message constructor.
     * @param string $formattedMessage
     * @param string $plainMessage
     */
    public function __construct(string $formattedMessage, string $plainMessage = '')
    {
        $this->formattedMessage = $formattedMessage;
        $this->plainMessage = $plainMessage;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'formattedMessage' => $this->formattedMessage,
            'plainMessage' => $this->plainMessage,
        ];
    }
}