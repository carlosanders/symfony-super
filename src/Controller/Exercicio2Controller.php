<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Exercicio2Controller extends AbstractController
{
    #[Route('/exercicio2/{nro}')]
    public function number(int $nro): Response
    {

        $ad = $nro + 2;
        $sub = $nro - 2;
        $mult = $nro * 2;
        $div = $nro / 2;

        return $this->render('exercicio2/exercicio2.html.twig', [
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
            'adicao' => $ad,
            'sub' => $sub,
            'mult' => $mult,
            'div' => $div
        ]);
    }
}