<?php

namespace App\Entity;

use App\Repository\VoorprogrammaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoorprogrammaRepository::class)]
class Voorprogramma
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'voorprogramma', targetEntity: Optreden::class)]
    private Collection $optredens;

    public function __construct()
    {
        $this->optredens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Optreden>
     */
    public function getOptredens(): Collection
    {
        return $this->optredens;
    }

    public function addOptreden(Optreden $optreden): self
    {
        if (!$this->optredens->contains($optreden)) {
            $this->optredens->add($optreden);
            $optreden->setVoorprogramma($this);
        }

        return $this;
    }

    public function removeOptreden(Optreden $optreden): self
    {
        if ($this->optredens->removeElement($optreden)) {
            // set the owning side to null (unless already changed)
            if ($optreden->getVoorprogramma() === $this) {
                $optreden->setVoorprogramma(null);
            }
        }

        return $this;
    }
}
