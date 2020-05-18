<?php 

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository 
{
    private $contact;
    public function __construct(Contact $contact){

        $this->contact = $contact;

    }

    public function getInfo($user_id){

        return $this->contact->where('user_id','=',$user_id)->get();
        
        
    }


        
}