<?php 

namespace App\Repositories;

use App\Models\CentresInteret;

class CentresInteretsRepository 
{
    private $centres_interets;
    public function __construct(CentresInteret $centres_interets){

        $this->centres_interets = $centres_interets;

    }

    public function getInfo($user_id){

        return $this->centres_interets->where('user_id','=',$user_id)->orderBy('ordre')->get();
        
        
    }


        
}