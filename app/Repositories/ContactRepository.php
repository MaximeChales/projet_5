<?php 

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository 
{
    private $contact;
    public function __construct(Contact $contact){

        $this->contact = $contact;

    }

    public function getInfo(){

        return $this->contact->get();
        
        
    }


        
}