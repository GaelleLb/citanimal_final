<?php

namespace App\Entity;

class RechercheAnimal {


    private $race;


    /**
     * @var string|null
     */
    private $sexe;




    
    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }


    /**
     * @return string|null
     */
    public function getSexe(): ?string {
        return $this->sexe;
    }

    /**
     * @param string|null $sexe
     * @return RechercheAnimal
     */
    public function setSexe(string $sexe): RechercheAnimal
    {
        $this->sexe = $sexe;

        return $this;
    }
}