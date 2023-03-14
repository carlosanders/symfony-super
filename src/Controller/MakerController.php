<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MakerController extends AbstractController
{
    #[Route('/maker', name: 'app_maker')]
    public function index(): Response
    {
        return $this->render('maker/index.html.twig', [
            'controller_name' => 'MakerController',
        ]);
    }
}
