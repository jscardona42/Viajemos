<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Libros;
use App\Entity\Editoriales;

class LibrosController extends AbstractController
{
    /**
     * @Route("/", name="libros")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $libros = $em->getRepository(Libros::class)->findAll();
        $editoriales = $em->getRepository(Editoriales::class)->findAll();


        return $this->render('libros/index.html.twig', [
            'libros' => $libros,
            'editoriales' => $editoriales
        ]);
    }

    /**
     * @Route("/crearlibros", name="crearlibros")
     */
    public function crearLibros(Request $request): Response
    {
        $editoriales_id = $request->request->get('editoriales_id');
        $titulo = $request->request->get('titulo');
        $sinopsis = $request->request->get('sinopsis');
        $n_paginas = $request->request->get('n_paginas');

        $em = $this->getDoctrine()->getManager();

        $editoriales = $em->getRepository(Editoriales::class)->find($editoriales_id);

        $libros = new libros();
        $libros->setEditoriales($editoriales);
        $libros->setTitulo($titulo);
        $libros->setSinopsin($sinopsis);
        $libros->setNPaginas($n_paginas);

        $em->persist($libros);
        $em->flush();

        // return new Response(
        //     'Guardado'
        // );

        $libros1 = $em->getRepository(Libros::class)->findAll();
        $editoriales = $em->getRepository(Editoriales::class)->findAll();

        return $this->render('libros/index.html.twig', [
            'libros' => $libros1,
            'editoriales' => $editoriales
        ]);
    }
    
}
