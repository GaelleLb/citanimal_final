<?php

namespace App\Entity;

class RechercheAnimal {

    private $sexe;

    public function getSexe() {
        return $this->sexe;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }
}