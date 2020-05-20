<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CentresInteretsRepository;
use App\Repositories\ContactRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $files = $request->file('photo_profil','logo_ci','logo_rs');
        $count = count($request->get('altci','altrs','linkrs'));

        for($i = 0 ; $i < $count ; $i++) {
            $filename = $files[$i]->getClientOriginalName();
            $files[$i]->move(base_path().'/public/img',$filename);
            $user = auth()->user();}
        
     
        User::updateOrCreate(['id' => $request->get('id')[$i]],
            [

                'nom' => $request->get('nom'),
                'prenom' => $request->get('prenom'),
                'date_de_naissance' => $request->get('date_de_naissance'),
                'job' => $request->get('job'),
                'adresse' => $request->get('address'),
                'code_postal' => $request->get('code_postal'),
                'ville' => $request->get('ville'),
                'telephone' => $request->get('phonenumber'),
                'accroche' => $request->get('accroche'),
                'email' => $request->get('email'),
                'permis_b' => $request->get('permis'),
                'photo_profil' => '../public/img/'. $filename,
                'password' => $request->get('password'),
                'logo_rs' => '../public/img/'. $filename,
                'logo_ci' => '../public/img/'. $filename,
                'description_ci' => $request->get('altci')[$i],
                'description_rs' => $request->get('altrs')[$i],
                'linkrs' => $request->get('linkrs')[$i],
            ]);

        return redirect()->to('admin/user/');
    }
}
