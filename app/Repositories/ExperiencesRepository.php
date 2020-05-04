<?php 

namespace App\Repositories;

use App\Models\Experience;

class ExperiencesRepository 
{
    private $experiences;
    public function __construct(Experience $experiences){

        $this->experiences = $experiences;

    }

    public function getInfo(){

        return $this->experiences->get();
        
        
    }


        
}