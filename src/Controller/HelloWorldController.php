<?php
namespace App\Controller;

use App\Entity\Produto;
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

    /**
     * @return Response
     * @Route("helloWorld/production")
     */
    public function production()
    {
        $em = $this->getDoctrine()->getManager();

        $produto = new Produto();
        $produto->setName('Chapeu para a cabeça')
            ->setPrice(300.50);

        $em->persist($produto);
        $em->flush();

        return new Response('O produto '. $produto->getId() . ' - '. $produto->getName()
            . ' foi salvo com sucesso!!!');
    }
}