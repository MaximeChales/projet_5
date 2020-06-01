<?php

namespace App\Http\Controllers;

use App\Models\CentresInteret;
use App\Models\Contact;
use App\Models\User;
use App\Repositories\CentresInteretsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //restreint l'accès à ceux qui sont connéctés
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserRepository $user, ContactRepository $contact, CentresInteretsRepository $centres_interets)
    {

        $auth = auth()->user();
        $user_info = $user->getInfo($auth->id);
        $contact_info = $contact->getInfo($auth->id);
        $centres_interets_info = $centres_interets->getInfo($auth->id);
        return view('useradmin', compact('user_info', 'contact_info', 'centres_interets_info'));
    }

    public function update(Request $request, ContactRepository $contact)
    {

        $auth = auth()->user();
        if ($request->hasFile('photo_profil')) {
            $file = $request->file('photo_profil');

            $filename = $file->getClientOriginalName();
            $file->move(base_path() . './public/img', $filename);

            //On liste les differentes données de la BDD (à gauche) et on les associe aux champs du form en utilisant les names
        }
        $data = [
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'date_de_naissance' => $request->get('date_de_naissance'),
            'job' => $request->get('job'),
            'adresse' => $request->get('address'),
            'code_postal' => $request->get('cp'),
            'ville' => $request->get('town'),
            'telephone' => $request->get('phonenumber'),
            'accroche' => $request->get('accroche'),
            'email' => $request->get('email'),
            'permis_b' => $request->get('permis'),
        ];

        //Si $filename existe déja, alors en en fait la valeur par defaut de $data photo_profil

        if (isset($filename)) {
            $data['photo_profil'] = $filename;
        }

        //On verifie que les inouts sont bien remplis et on ajoute d'autres conditions pour certains (email, int uniquement)

        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'date_de_naissance' => 'required',
            'job' => 'required',
            'address' => 'required',
            'cp' => 'required|integer',
            'town' => 'required',
            'phonenumber' => 'required',
            'accroche' => 'required',
            'email' => 'required|email',
            'permis' => 'required',
        ]);
        User::updateOrCreate(['id' => $auth->id], $data);

        //   gestion reseaux sociaux

        $count = count($request->get('linkrs'));

        if ($request->hasFile('logors')) {
            $logosrs = $request->file('logors');
            foreach ($logosrs as $key => $logors) {
                $filename_rs[$key] = $logors->getClientOriginalName();
                $logors->move(base_path() . './public/img', $filename_rs[$key]);
            }
        }
        for ($i = 0; $i < $count; $i++) {
            $data = [
                'user_id' => $auth->id,
                'url' => $request->get('linkrs')[$i],
                'description_rs' => $request->get('altrs')[$i],

            ];
            //Si $filename_rs existe déja, alors en en fait la valeur par defaut de $data logo_rs

            if (isset($filename_rs[$i])) {
                $data['logo_rs'] = $filename_rs[$i];
            }

            /*          $this->validate($request, [
            'linkrs' => 'required',
            'altrs' => 'required',
            ]);*/
            Contact::updateOrCreate(['id' => $request->get('id')[$i]], $data);
        }

//   gestion centres d'interets

        $count = count($request->get('altci'));

        if ($request->hasFile('logo_ci')) {
            $logosci = $request->file('logo_ci');
            foreach ($logosci as $key => $logoci) {
                $filename_ci[$key] = $logoci->getClientOriginalName();
                $logoci->move(base_path() . './public/img', $filename_ci[$key]);
            }
        }
        for ($i = 0; $i < $count; $i++) {
            $data = [
                'user_id' => $auth->id,
                'description_ci' => $request->get('altci')[$i],
            ];

            //Si $filename_ci existe, alors en en fait la valeur par defaut de $data logo_ci

            if (isset($filename_ci[$i])) {
                $data['logo_ci'] = $filename_ci[$i];
            }
            CentresInteret::updateOrCreate(['id' => $request->get('ci_id')[$i]], $data);
        }

        return redirect()->to('admin/user/');
    }

}
