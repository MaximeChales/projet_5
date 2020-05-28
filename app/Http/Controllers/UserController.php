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

        if (isset($filename)) {
            $data['photo_profil'] = $filename;
        }
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

            if (isset($filename_rs[$i])) {
                $data['logo_rs'] = $filename_rs[$i];
            }
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

            if (isset($filename_ci[$i])) {
                $data['logo_ci'] = $filename_ci[$i];
            }
            CentresInteret::updateOrCreate(['id' => $request->get('ci_id')[$i]], $data);
        }

        return redirect()->to('admin/user/');
    }

}