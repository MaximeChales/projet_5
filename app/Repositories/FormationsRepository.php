<?php 

namespace App\Repositories;

use App\Models\Formation;

class FormationsRepository 
{
    private $formations;
    public function __construct(Formation $formations){

        $this->formations = $formations;

    }

    public function getInfo($user_id){

        return $this->formations->where('user_id','=',$user_id)->get();
        
        
    }


        
}