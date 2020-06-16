<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="animaux_image", fileNameProperty="photo")
     */
    private $imageFile; 


    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="animaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\Column(type="boolean")
     */
    private $disponible;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur_pelage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longueur_pelage;

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
    private $sterilisation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $vaccin;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $details;

    /**
     * @ORM\ManyToOne(targetEntity=Espece::class, inversedBy="animaux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $espece;


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

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        return $this;

        //if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
           // $this->updatedAt = new \DateTimeImmutable();
       // }
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
        return $this->sterilisation;
    }

    public function setSterilisation(bool $sterilisation): self
    {
        $this->sterilisation = $sterilisation;

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
