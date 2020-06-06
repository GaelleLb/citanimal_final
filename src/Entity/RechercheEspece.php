<?php

namespace App\Entity;

class RechercheEspece {

    private $espece;


    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(string $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

}