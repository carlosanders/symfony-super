<?php
// src/MessageHandler/SmsNotificationHandler.php
namespace App\MessageHandler;
use App\Entity\Processo;
use App\Message\SmsNotification;
use App\Repository\ProcessoRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
class SmsNotificationHandler
{
    #private ProcessoRepository $processoRepository;

    public function __construct(private ProcessoRepository $processoRepository){        
    }

    public function __invoke(SmsNotification $message)
    {
        // ... do some work - like sending an SMS message!
        $processo = new Processo();
        $processo->setTitulo($message->getContent());
        $processo->setDescricao($message->getContent());
        $processo->setObservacao($message->getContent());
        $processo->setClassificacao($message->getContent());
        $processo->setNumero(12344);

        $this->processoRepository->save($processo, true);
    }
} 