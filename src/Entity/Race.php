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
     * @ORM\Column(type="string", length=255)
     */
    private $couleur_pelage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longueur_pelage;

    /**
     * @ORM\OneToMany(targetEntity=Animal::class, mappedBy="race")
     */
    private $animaux;

    /**
     * @ORM\ManyToOne(targetEntity=Espece::class, inversedBy="race")
     * @ORM\JoinColumn(nullable=false)
     */
    private $espece;


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

    public function getCouleurPelage(): ?string
    {
        return $this->couleur_pelage;
    }

    public function setCouleurPelage(string $couleur_pelage): self
    {
        $this->couleur_pelage = $couleur_pelage;

        return $this;
    }

    public function getLongueurPelage(): ?string
    {
        return $this->longueur_pelage;
    }

    public function setLongueurPelage(string $longueur_pelage): self
    {
        $this->longueur_pelage = $longueur_pelage;

        return $this;
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

    public function getEspece(): ?Espece
    {
        return $this->espece;
    }

    public function setEspece(?Espece $espece): self
    {
        $this->espece = $espece;

        return $this;
    }


}
