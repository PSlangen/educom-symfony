<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Optreden;


class OptredenController extends AbstractController
{

    #[Route('/optreden', name: 'app_optreden')]
    public function index(): Response
    {
        return $this->render('optreden/index.html.twig', [
            'controller_name' => 'OptredenController',
        ]);
    }

    
    #[Route('/test', name: 'test')]
      
    public function test() {
        
       $this->getDoctrine()->getRepository(Optreden::class) -> deleteOptredenArtiest(4);
       dd("test");
    }
}
