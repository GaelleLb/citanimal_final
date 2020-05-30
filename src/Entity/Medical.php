<?php

namespace App\Entity;

use App\Repository\MedicalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicalRepository::class)
 */
class Medical
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $fiv;

    /**
     * @ORM\Column(type="boolean")
     */
    private $felv;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Sterilisation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vaccin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $details;

    /**
     * @ORM\OneToMany(targetEntity=Animal::class, mappedBy="medical")
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

    public function getFiv(): ?bool
    {
        return $this->fiv;
    }

    public function setFiv(bool $fiv): self
    {
        $this->fiv = $fiv;

        return $this;
    }

    public function getFelv(): ?bool
    {
        return $this->felv;
    }

    public function setFelv(bool $felv): self
    {
        $this->felv = $felv;

        return $this;
    }

    public function getSterilisation(): ?bool
    {
        return $this->Sterilisation;
    }

    public function setSterilisation(bool $Sterilisation): self
    {
        $this->Sterilisation = $Sterilisation;

        return $this;
    }

    public function getVaccin(): ?bool
    {
        return $this->vaccin;
    }

    public function setVaccin(bool $vaccin): self
    {
        $this->vaccin = $vaccin;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

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
            $animaux->setMedical($this);
        }

        return $this;
    }

    public function removeAnimaux(Animal $animaux): self
    {
        if ($this->animaux->contains($animaux)) {
            $this->animaux->removeElement($animaux);
            // set the owning side to null (unless already changed)
            if ($animaux->getMedical() === $this) {
                $animaux->setMedical(null);
            }
        }

        return $this;
    }
}
