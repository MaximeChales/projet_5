<?php 

namespace App\Repositories;

use App\Models\Experience;

class ExperiencesRepository 
{
    private $experiences;
    public function __construct(Experience $experiences){

        $this->experiences = $experiences;

    }

    public function getInfo($user_id){

        return $this->experiences->where('user_id','=',$user_id)->get();
        
        
    }


        
}