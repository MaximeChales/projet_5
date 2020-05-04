<?php 

namespace App\Repositories;

use App\Models\Formation;

class FormationsRepository 
{
    private $formations;
    public function __construct(Formation $formations){

        $this->formations = $formations;

    }

    public function getInfo(){

        return $this->formations->get();
        
        
    }


        
}