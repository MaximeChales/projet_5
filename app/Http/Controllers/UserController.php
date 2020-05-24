<?php

namespace App\Http\Controllers;

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

    public function update(Request $request)
    {

        if ($request->hasFile('photo_profil')) {
            $files = $request->file('photo_profil');
          /*  dump($files);exit;*/


                $filename = $files->getClientOriginalName();
                $files->move(base_path() . './public/img', $filename);
           


        }      

       // $count = count($request->get('linkrs'));

        // On recupere les données de la BDD dans la variable $data
    //    for ($i = 0; $i < $count; $i++) {
            $data = [
                
                'photo_profil' => $request->get('photo_profil'),
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
                'password' => $request->get('password'),
                'description_ci' => $request->get('altci'),
                'description_rs' => $request->get('altrs'),
                'url' => $request->get('linkrs'),
            ];


            if (isset($filename)) {
                $data['image'] = $filename;
            }

            User::updateOrCreate(['id' => $request->get('id')], $data);
            
   //     }

        return redirect()->to('admin/projets/');
    }

}
