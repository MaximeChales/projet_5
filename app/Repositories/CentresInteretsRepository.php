<?php 

namespace App\Repositories;

use App\Models\CentresInteret;

class CentresInteretsRepository 
{
    private $centres_interets;
    public function __construct(CentresInteret $centres_interets){

        $this->centres_interets = $centres_interets;

    }

    public function getInfo(){

        return $this->centres_interets->orderBy('ordre')->get();
        
        
    }


        
}