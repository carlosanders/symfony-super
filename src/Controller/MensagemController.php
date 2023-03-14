<?php

namespace App\Controller;

use App\Message\SmsNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class MensagemController extends AbstractController
{
    #[Route('/sms')]
    public function index(MessageBusInterface $bus): Response
    {

        // will cause the SmsNotificationHandler to be called 

       $bus->dispatch(new SmsNotification('Teste de mensagem!'));

        return new Response(
            '<html><body>Sucesso</body></html>'
        );

    }
}
