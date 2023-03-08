<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artiest;

class ArtiestService {

    private $artiestRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->artiestRepository = $em->getRepository(Artiest::class);
    }

    public function saveArtiest ($params) {
        $result = $this->artiestRepository->saveArtiest($params);
        return($result);
    }

}