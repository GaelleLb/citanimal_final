<?php

namespace App\Entity;

use App\Repository\EspeceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspeceRepository::class)
 */
class Espece
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
    private $nom_espece;

    /**
     * @ORM\OneToMany(targetEntity=Race::class, mappedBy="espece")
     */
    private $race;

    public function __construct()
    {
        $this->race = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEspece(): ?string
    {
        return $this->nom_espece;
    }

    public function setNomEspece(string $nom_espece): self
    {
        $this->nom_espece = $nom_espece;

        return $this;
    }

    public function __tostring() {
        return $this->nom_espece;
    }

    /**
     * @return Collection|Race[]
     */
    public function getRace(): Collection
    {
        return $this->race;
    }

    public function addRace(Race $race): self
    {
        if (!$this->race->contains($race)) {
            $this->race[] = $race;
            $race->setEspece($this);
        }

        return $this;
    }

    public function removeRace(Race $race): self
    {
        if ($this->race->contains($race)) {
            $this->race->removeElement($race);
            // set the owning side to null (unless already changed)
            if ($race->getEspece() === $this) {
                $race->setEspece(null);
            }
        }

        return $this;
    }
}
