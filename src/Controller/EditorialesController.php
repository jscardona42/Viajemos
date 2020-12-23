<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Editoriales;

class EditorialesController extends AbstractController
{
    /**
     * @Route("/editoriales", name="editoriales")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $editoriales = $em->getRepository(Editoriales::class)->findAll();

        return $this->render('editoriales/index.html.twig', [
            'editoriales' => $editoriales
        ]);
    }

    /**
     * @Route("/creareditoriales", name="creareditoriales")
     */
    public function crearEditoriales(Request $request): Response
    {
        try {
            $nombre = $request->request->get('nombre');
            $sede = $request->request->get('sede');

            $em = $this->getDoctrine()->getManager();

            $editoriales = new Editoriales();
            $editoriales->setNombre($nombre);
            $editoriales->setSede($sede);

            $em->persist($editoriales);
            $em->flush();

            $data = array(
                "status" => 200
            );

        } catch (\Throwable $th) {
            $data = array(
                "status" => 401
            );
        }

        $response = new Response(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
    
        return $response;

        $editoriales = $em->getRepository(Editoriales::class)->findAll();

        return $this->render('editoriales/index.html.twig', [
            'editoriales' => $editoriales
        ]);
    }
}
