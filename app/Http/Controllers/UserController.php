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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UserRepository $user, ContactRepository $contact, CentresInteretsRepository $centres_interets)
    {
        $user_info = $user->getInfo(1);
        $contact_info = $contact->getInfo(1);
        $centres_interets_info = $centres_interets->getInfo(1);

        return view('useradmin', compact('user_info', 'contact_info', 'centres_interets_info'));
    }

    public function update(Request $request)
    {
        $files = $request->file('photo','logors','logoci');
        $count = count($request->get('altrs','linkrs','altci','linkci'));

        for ($i = 0; $i < $count; $i++) {
            $filename = $files[$i]->getClientOriginalName();
            $files[$i]->move(base_path() . '/public/img', $filename);
        
        }
        User::updateOrCreate(['id' => $request->get('user_id')],
            [
                'user_id' => $user->id,
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
                'logo' => '../public/img/'. $filename,
                'logo' => '../public/img/'. $filename,
                'altci' => $request->get('name'),
            ]);

        return redirect()->to('admin/user/');
    }
}
