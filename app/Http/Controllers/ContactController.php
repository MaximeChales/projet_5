<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use App\Models\Contact;

class ContactController extends Controller


{
        //restreint l'accès à ceux qui sont connéctés
        public function __construct()
        {
            $this->middleware('auth');
        }

}

