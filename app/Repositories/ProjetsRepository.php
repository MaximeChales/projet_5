<?php 

namespace App\Repositories;

use App\Models\Projet;

class ProjetsRepository 
{
    private $projets;
    public function __construct(Projet $projets){

        $this->projets = $projets;

    }

    public function getInfo()
    {

            return $this->projets->orderBy('ordre')->get();
        
    }


        
}