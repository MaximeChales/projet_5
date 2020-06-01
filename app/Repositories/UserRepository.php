<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private $user;
    public function __construct(User $user){

        $this->user = $user;
    }
    // id est le id de la table user
    public function getInfo($id){


        return $this->user->findOrFail($id);
        
        
    }


        
}