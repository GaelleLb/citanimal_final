<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $caractere;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $compatibilite_chien;

    /**
     * @ORM\Column(type="boolean")
     */
    private $compatibilite_chat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $compatibilite_enfant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Medical::class, inversedBy="animaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medical;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="animaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getCaractere(): ?string
    {
        return $this->caractere;
    }

    public function setCaractere(?string $caractere): self
    {
        $this->caractere = $caractere;

        return $this;
    }

    public function getHistoire(): ?string
    {
        return $this->histoire;
    }

    public function setHistoire(?string $histoire): self
    {
        $this->histoire = $histoire;

        return $this;
    }


    public function getCompatibiliteChien(): ?bool
    {
        return $this->compatibilite_chien;
    }

    public function setCompatibiliteChien(bool $compatibilite_chien): self
    {
        $this->compatibilite_chien = $compatibilite_chien;

        return $this;
    }

    public function getCompatibiliteChat(): ?bool
    {
        return $this->compatibilite_chat;
    }

    public function setCompatibiliteChat(bool $compatibilite_chat): self
    {
        $this->compatibilite_chat = $compatibilite_chat;

        return $this;
    }

    public function getCompatibiliteEnfant(): ?bool
    {
        return $this->compatibilite_enfant;
    }

    public function setCompatibiliteEnfant(bool $compatibilite_enfant): self
    {
        $this->compatibilite_enfant = $compatibilite_enfant;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getMedical(): ?Medical
    {
        return $this->medical;
    }

    public function setMedical(?Medical $medical): self
    {
        $this->medical = $medical;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function __tostring() {
        return $this->race;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }
}
