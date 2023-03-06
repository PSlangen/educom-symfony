<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Artiest;


class ArtiestController extends AbstractController
{
  
    #[Route('/artiest', name: 'artiest')]
    public function index(): Response
    {
       /// We simuleren hier even een $_POST van een formulier
       $artiest = [
        "naam" => "Tool",
        "adres" => "Los Angeles",
        "genre" => "Metal",
        "omschrijving" => "Tool is een Amerikaanse rock- en metalband uit Los Angeles. Hun muziek wordt ook wel progressieve metal genoemd.",
        "afbeelding_url" => "blank",
        "website" => "blank",
       ];

       $rep = $this->getDoctrine()->getRepository(Artiest::class);
       $result = $rep->saveArtiest($artiest);

       dd($result);

    }
}
