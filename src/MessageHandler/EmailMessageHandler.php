<?php

namespace App\MessageHandler;

use App\Message\EmailMessage;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
final class EmailMessageHandler
{
    private $userRepository;
    private $mailer;

    public function __construct(UserRepository $userRepository, MailerInterface $mailer)
    {
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
    }

    public function __invoke(EmailMessage $message)
    {
        $user = $this->userRepository->find($message->getUserId());
        $email = (new Email())
            ->from('email@example.com')
            ->to($user->getEmail())
            ->subject($message->getSubject())
            ->text($message->getMessage());

        $this->mailer->send($email);
    }
}
