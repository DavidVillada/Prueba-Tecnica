<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Peliculas;
use App\Form\RegistroPeli;

class PeliculasController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    #[Route('/peliculas', name: 'app_peliculas')]
    //Crear
    public function registro(Request $request): Response
    {

        $pelicula = new Peliculas();
        $form = $this->createForm(RegistroPeli::class, $pelicula);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->doctrine->getManager();
            $em->persist($pelicula);
            $em->flush();

            return $this->redirectToRoute('register');
        }

        $peliculas_repo = $this->doctrine->getRepository(Peliculas::class);
        $peliculas = $peliculas_repo->findAll();


        return $this->render('peliculas/registro.html.twig', [
            'form' => $form->createView(),
            'peliculas' => $peliculas
        ]);
    }
    //Editar
    public function edit(Request $request, Peliculas $pelicula)
    {

        $form = $this->createForm(RegistroPeli::class, $pelicula);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->doctrine->getManager();
            $em->persist($pelicula);
            $em->flush();

            return $this->redirectToRoute('register');
        }

        return $this->render('peliculas/registro.html.twig', [
            'edit' => true,
            'form' => $form->createView(),
            'peliculas' => $pelicula
        ]);
    }
    //Eliminar
    public function delete(Peliculas $pelicula)
    {
        $em = $this->doctrine->getManager();
        $em->remove($pelicula);
        $em->flush();

        return $this->redirectToRoute('register');
    }
}
