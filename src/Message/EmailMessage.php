<?php

namespace App\Message;

final class EmailMessage
{
    private $userId;
    private $subject;
    private $message;

    public function __construct(int $userId, string $subject, string $message)
    {
        $this->userId = $userId;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
