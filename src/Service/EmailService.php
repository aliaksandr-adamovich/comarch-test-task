<?php

namespace App\Service;

use App\Repository\UserRepository;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\EmailMessage;

class EmailService
{
    private $userRepository;
    private $messageBus;

    public function __construct(UserRepository $userRepository, MessageBusInterface $messageBus)
    {
        $this->userRepository = $userRepository;
        $this->messageBus = $messageBus;
    }

    public function sendEmails(array $users, array $data): void
    {
        foreach ($users as $user) {
            $emailMessage = new EmailMessage($user->getId(), $data['subject'], $data['emailBody']);
            $this->messageBus->dispatch($emailMessage);
        }
    }

    public function getUsersByCategory(string $category): array
    {
        return $this->userRepository->findByCategory($category);
    }
}
