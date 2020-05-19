<?php 

namespace App\Repositories;

use App\Models\Projet;

class ProjetsRepository 
{
    private $projets;
    public function __construct(Projet $projets){

        $this->projets = $projets;

    }

    public function getInfo($user_id)
    {

            return $this->projets->where('user_id','=',$user_id)->orderBy('ordre')->get();
        
    }


        
}