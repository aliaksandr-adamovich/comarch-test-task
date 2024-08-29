<?php

namespace App\Controller;

use App\Form\Type\EmailType;
use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailController extends AbstractController
{
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @Route("/email/send", name="email_send_get", methods={"GET"})
     */
    public function showForm(): Response
    {
        $form = $this->createForm(EmailType::class);

        return $this->render('email/send.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/email/send", name="email_send_post", methods={"POST"})
     */
    public function sendEmail(Request $request): Response
    {
        $form = $this->createForm(EmailType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $category = $data['category'];

            $categoryId = $category->getId();

            $users = $this->emailService->getUsersByCategory($categoryId);

            foreach ($users as $user) {
                $data['emailBody'] = $this->renderView('email/user_email.html.twig', [
                    'user' => $user,
                    'message' => $data['messageType'] === 'default' ? 'This is the default message.' : $data['message']
                ]);

                $this->emailService->sendEmails([$user], $data);
            }

            return $this->redirectToRoute('email_send_get');
        }

        return $this->render('email/send.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
