<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Optreden;
use App\Entity\Artiest;


class OptredenController extends AbstractController
{

    private $artiestRep;
    private $optredenRep;



    #[Route('/optreden', name: 'app_optreden')]
    public function index(): Response
    {
        return $this->render('optreden/index.html.twig', [
            'controller_name' => 'OptredenController',
        ]);
    }

    
    #[Route('/test/{id}', name: 'test')]
    public function test($id){
        $this->artiestRep = $this->getDoctrine()->getRepository(Artiest::class);
        $this->optredenRep = $this->getDoctrine()->getRepository(Optreden::class);
        $artiest = $this->artiestRep->find($id);
        $optreden = $this->optredenRep->deleteOptredensByArtiest($artiest);
        $artiestDeleted = $this->artiestRep->deleteArtiest($artiest->getId());

        dd($optreden);
    }

     
}
