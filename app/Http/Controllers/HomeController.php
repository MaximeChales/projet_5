<?php

namespace App\Http\Controllers;

use App\Repositories\CentresInteretsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ExperiencesRepository;
use App\Repositories\FormationsRepository;
use App\Repositories\ProjetsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index(UserRepository $user, ContactRepository $contact, CentresInteretsRepository $centres_interets,
        ProjetsRepository $projets, ExperiencesRepository $experiences, FormationsRepository $formations) {
        $user_info = $user->getInfo(1);
        $contact_info = $contact->getInfo(1);
        $centres_interets_info = $centres_interets->getInfo(1);
        $projets_info = $projets->getInfo(1);
        $experiences_info = $experiences->getInfo(1);
        $formations_info = $formations->getInfo(1);

        return view('home', compact('user_info', 'contact_info', 'centres_interets_info', 'projets_info', 'experiences_info', 'formations_info'));

    }

}
