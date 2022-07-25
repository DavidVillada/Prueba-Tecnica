<?php

namespace App\Controller;

use App\Entity\Alquiler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Usuarios;
use App\Entity\Peliculas;
use App\Form\RegistroAlquiler;

class AlquilerController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    #[Route('/alquiler', name: 'app_alquiler')]
    public function alquilar(Request $request): Response
    {

        $alquiler = new Alquiler();
        $form = $this->createForm(RegistroAlquiler::class, $alquiler);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->doctrine->getManager();
            $idPelicula = $alquiler->getpeliculaId();
            $dias = $this->calcularDias($alquiler);
            $valorTotal = $this->calcularPrecio($idPelicula, $dias);
            $alquiler->setValorTotal($valorTotal);
            $em->persist($alquiler);
            $em->flush();

            return $this->redirectToRoute('alquiler');
        }

        $usuarios_repo = $this->doctrine->getRepository(Usuarios::class);
        $usuarios = $usuarios_repo->findAll();


        $peliculas_repo = $this->doctrine->getRepository(Peliculas::class);
        $peliculas = $peliculas_repo->findAll();


        return $this->render('alquiler/alquilar.html.twig', [
            'form' => $form->createView(),
            'usuarios' => $usuarios,
            'peliculas' => $peliculas
        ]);
    }
    public function calcularDias($alquiler){
        $fechaInicio = $alquiler->getFechaInicio();
        $fechaFin = $alquiler->getFechaFin();
        $diff = $fechaInicio->diff($fechaFin);
        $dias = $diff->days;

        return $dias;
}

    public function calcularPrecio($idPelicula, $dias){
        $peliculas_repo = $this->doctrine->getRepository(Peliculas::class);
        $peliculas = $peliculas_repo->findOneBy(array('id' => $idPelicula));

        $valor = $peliculas->getPrecioUnitario();
        $fechaEstreno = $peliculas->getFechaestreno();
        //$fechaEstreno = $fechaEstreno->format('Y-m-d H');
        $date = new \DateTime('@'.strtotime('now'));
        $diff = $fechaEstreno->diff($date);
        $anios = $diff->y;
        switch($anios){
            case $anios <= 1:
                    $valorTotal = ($valor * $dias);
                break;
            case $anios <=2 : 
                    if ($dias <= '3'){
                        $valorTotal = ($valor * $dias);
                    } else {
                        $diasTot = ($dias - 3);
                        $precioUni = ($valor * 3);
                        $porcentaje = ($valor * 15)/100;
                        $precioNuevo = $valor + $porcentaje;
                        $valorTotal = ($precioUni + ($precioNuevo * $diasTot));
                    }
                break;
            case $anios > 2:
                    if ($dias <= '5'){
                        $valorTotal = ($valor * $dias);
                    } else {
                        $diasTot = ($dias - 5);
                        $precioUni = ($valor * 5);
                        $porcentaje = ($valor * 10)/100;
                        $precioNuevo = $valor + $porcentaje;
                        $valorTotal = ($precioUni + ($precioNuevo * $diasTot));
                    }
                break;
        }
        return $valorTotal;
    }

}
