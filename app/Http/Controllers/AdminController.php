<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\ContactRepository;
use App\Repositories\CentresInteretsRepository;
use App\Repositories\ProjetsRepository;
use App\Repositories\ExperiencesRepository;
use App\Repositories\FormationsRepository;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(UserRepository $user,ContactRepository $contact){
        $user_info = $user->getInfo(1);
        $contact_info = $contact->getInfo(1);
        return  view('indexadmin', compact('user_info','contact_info'));
    }


    public function _index(UserRepository $user, ContactRepository $contact, CentresInteretsRepository $centres_interets,
    ProjetsRepository $projets,ExperiencesRepository $experiences, FormationsRepository $formations){
        $user_info = $user->getInfo(1);
        $contact_info = $contact->getInfo(1);
        $centres_interets_info = $centres_interets->getInfo(1);
        $projets_info = $projets->getInfo(1);
        $experiences_info = $experiences->getInfo(1);
        $formations_info = $formations->getInfo(1);

        return  view('indexadmin', compact('user_info','contact_info','centres_interets_info','projets_info',
        'experiences_info','formations_info'));
    }
}

