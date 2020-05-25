<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
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

    public function update(Request $request,ContactRepository $contact)
    {
        $auth = auth()->user();
                if ($request->hasFile('photo_profil')) {
            $file = $request->file('photo_profil');
          /*  dump($files);exit;*/


                $filename = $file->getClientOriginalName();
                $file->move(base_path() . './public/img', $filename);
           


        }      


        // On recupere les données de la BDD dans la variable $data
    //    for ($i = 0; $i < $count; $i++) {
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



            if (isset($filename)) {
                $data['photo_profil'] = $filename;
            }

            User::updateOrCreate(['id' => $auth->id], $data);
            
   //     }
        $count = count($request->get('linkrs'));
                  /*  dump($request);exit;*/

        if ($request->hasFile('logors')) {
            $files = $request->file('logors');
            foreach ($files as $key => $file) {
                $filename[$key] = $file->getClientOriginalName();
                $file->move(base_path().'./public/img',$filename[$key]);
            }
        }
        for($i = 0 ; $i < $count ; $i++) {
            $data = [
                'user_id' => $auth->id,
                'url' => $request->get('linkrs')[$i],
                'description_rs' => $request->get('altrs')[$i],

            ];

            if(isset($filename[$i])){
             $data['logo_rs'] = $filename[$i];
            }
            Contact::updateOrCreate(['id' => $request->get('id')[$i]], $data);
        }

        return redirect()->to('admin/user/');
    }

}
