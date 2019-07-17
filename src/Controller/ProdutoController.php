<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    /**
     * @Route("/produto", name="index_produto")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $produtos = $em->getRepository(Produto::class)->findAll();

        return $this->render('produto/index.html.twig', ['produtos'=>$produtos]);
    }

    /**
     * @Route("/produto/cadastrar", name="cadastrar_produto")
     */
    public function create(Request $request)
    {
        $produto = new Produto();
        $form    = $this->createForm(ProdutoType::class, $produto);

        // aplica as validações
        $form->handleRequest($request);

        // caso o formulário foi submetido e for válido
        if ($form->isSubmitted() && $form->isValid()) {

            // salva dos dados
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            // envia mensagem de sucesso
            $this->get('session')->getFlashBag()->set('success', 'Produto foi salvo com sucesso!!!');

            // redireciona para a página principal
            return $this->redirectToRoute('index_produto');
        }

        return $this->render('produto/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("produto/editar/{id}", name="editar_produto")
     */
    public function update(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $produto = $em->getRepository(Produto::class)->find($id);

        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($produto);
            $em->flush();

            $this->get('session')->getFlashBag()->set('success', 'O Produto '. $produto->getName()
                . ' foi alterado com sucesso!!!');

            return $this->redirectToRoute('index_produto');
        }

        return $this->render('produto/update.html.twig', [
            'produto' => $produto,
            'form' => $form->createView()
        ]);
    }
}
