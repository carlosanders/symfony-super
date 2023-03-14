<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Exercicio1Controller
{
    #[Route('/exercicio1/{nro}')]
    public function number(int $nro): Response
    {
        $number = random_int(0, $nro);
        $resultado = '';

        if ($nro % 2 == 0) {
            $resultado = 'par';
        } else {
            $resultado = "impar";
        }

        return new Response(
            '<html><body>number: ' . $resultado . '</body></html>'
        );
    }
}