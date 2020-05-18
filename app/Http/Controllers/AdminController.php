<?php

namespace App\Http\Controllers;

use App\Repositories\CentresInteretsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ExperiencesRepository;
use App\Repositories\FormationsRepository;
use App\Repositories\ProjetsRepository;
use App\Repositories\UserRepository;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserRepository $user, ContactRepository $contact)
    {
        $auth = auth()->user();
        $user_info = $user->getInfo($auth->id);
        $contact_info = $contact->getInfo($auth->id);
        return view('indexadmin', compact('user_info', 'contact_info'));
    }
}
