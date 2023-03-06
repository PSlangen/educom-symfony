<?php

namespace App\Repository;

use App\Entity\Artiest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artiest>
 *
 * @method Artiest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artiest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artiest[]    findAll()
 * @method Artiest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtiestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artiest::class);
    }

    public function save(Artiest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Artiest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function saveArtiest($params) {
        
        $artiest = new Artiest();
        $artiest->setNaam($params["naam"]);
        $artiest->setAdres($params["adres"]);
        $artiest->setGenre($params["genre"]);
        $artiest->setOmschrijving($params["omschrijving"]);
        $artiest->setAfbeeldingUrl($params["afbeelding_url"]);
        $artiest->setWebsite($params["website"]);

        $this->_em->persist($artiest);
        $this->_em->flush();

        return($artiest);
    }

    public function fetchArtiest($id) {
        return($this->find($id));
    }

    public function deleteArtiest($id) {
    
        $artiest = $this->find($id);

        if($artiest) {
            $this->_em->remove($artiest);
            $this->_em->flush();
            return(true);
        }
    
        return(false);
    }


}
