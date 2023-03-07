<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\OptredenService;

use App\Entity\Optreden;
use App\Entity\Artiest;

#[Route('/optreden')]
class OptredenController extends AbstractController
{
    private $os; 

    public function __construct(OptredenService $os) {
        $this->os = $os;      
    }

    #[Route('/save', name: 'optreden_save')] 
    public function saveOptreden() {

        $optreden = [
            "poppodium_id" => 1,
            "hoofdprogramma_id" => 1, 
            "voorprogramma_id" => 2,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            "prijs" => 3800,
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $this->os->saveOptreden($optreden);
        dd($result);

    }

    
    #[Route('/delete/{id}', name: 'test')]
    public function delete($id){
        $this->artiestRep = $this->getDoctrine()->getRepository(Artiest::class);
        $this->optredenRep = $this->getDoctrine()->getRepository(Optreden::class);
        $artiest = $this->artiestRepository->find($id);
        $optreden = $this->optredenRepository->deleteOptredensByArtiest($artiest);

        $artiestDeleted = $this->artiestRep->deleteArtiest($artiest->getId());

        dd($optreden);
    }

     
}
