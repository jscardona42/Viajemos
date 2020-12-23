<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Autores;

class AutoresController extends AbstractController
{
    /**
     * @Route("/autores", name="autores")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $autores = $em->getRepository(Autores::class)->findAll();

        return $this->render('autores/index.html.twig', [
            'autores' => $autores,
        ]);
    }
}
