<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends Controller
{
    /**
     * @return Response
     * @Route("helloWorld/ola")
     */
    public function ola()
    {
        return new Response('Olá pessoal');
    }

    /**
     * @return Response
     * @Route("helloWorld/mensagem")
     */
    public function mensagem()
    {
        return $this->render('helloWorld/mensagem.html.twig', [
            'mensagem' => "Teste da mensagem"
        ]);
    }
}