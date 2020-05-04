<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CentresInteretsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserRepository $user, ContactRepository $contact, CentresInteretsRepository $centres_interets)
    {
        $user_info = $user->getInfo(1);
        $contact_info = $contact->getInfo(1);
        $centres_interets_info = $centres_interets->getInfo(1);
        return view('useradmin', compact('user_info', 'contact_info', 'centres_interets_info'));
    }

    public function update(Request $request)
    {

        //  $validated = $request->validate([       'nom'=>'required','prenom'=>'required']);
        User::updateOrCreate(['id' => $request->get('user_id')],
            [
                'nom' => $request->get('nom'),
                'prenom' => $request->get('prenom'),
                'date_de_naissance' => '2012-01-01',
                'job' => '2012-01-01',
                'adresse' => '2012-01-01',
                'code_postal' => '20128',
                'ville' => '2012-01-01',
                'telephone' => '2012-01-01',
                'accroche' => '2012-01-01',
                'email' => '2012-01-01',
                'photo_profil' => '2012-01-01',
                'password' => 'toto',

            ]);

        dump($request->all());
    }
}
