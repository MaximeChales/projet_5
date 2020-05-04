<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository 
{
    private $user;
    public function __construct(User $user){

        $this->user = $user;
    }

    public function getInfo($id){

        return $this->user->findOrFail($id);
        
        
    }


        
}