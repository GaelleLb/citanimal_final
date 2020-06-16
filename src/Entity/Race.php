<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_race;


    /**
     * @ORM\OneToMany(targetEntity=Animal::class, mappedBy="race")
     */
    private $animaux;



    public function __construct()
    {
        $this->animaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRace(): ?string
    {
        return $this->nom_race;
    }

    public function setNomRace(string $nom_race): self
    {
        $this->nom_race = $nom_race;

        return $this;
    }

    public function __tostring() {
        return $this->nom_race;
    }

    
    /**
     * @return Collection|Animal[]
     */
    public function getAnimaux(): Collection
    {
        return $this->animaux;
    }

    public function addAnimaux(Animal $animaux): self
    {
        if (!$this->animaux->contains($animaux)) {
            $this->animaux[] = $animaux;
            $animaux->setRace($this);
        }

        return $this;
    }

    public function removeAnimaux(Animal $animaux): self
    {
        if ($this->animaux->contains($animaux)) {
            $this->animaux->removeElement($animaux);
            // set the owning side to null (unless already changed)
            if ($animaux->getRace() === $this) {
                $animaux->setRace(null);
            }
        }

        return $this;
    }



}
