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

    public function uploadForm()
    {
        return view('useradmin');
    }
    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'photo_profil','logors','logoci' => 'required',
        ]);
        if ($request->hasFile('images')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                //dd($check);
                if ($check) {
                    $items = Item::create($request->all());
                    foreach ($request->photos as $photo) {
                        $filename = $photo->store('images');
                        ItemDetail::create([
                            'item_id' => $items->id,
                            'filename' => $filename,
                        ]);
                    }
                    echo "Upload Successfully";
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
        }
    }

    public function update(Request $request)
    {

        //  $validated = $request->validate([       'nom'=>'required','prenom'=>'required']);
        User::updateOrCreate(['id' => $request->get('user_id')],
       
            [
                $user = auth()->user(),
                'nom' => $request->get('nom'),
                'prenom' => $request->get('prenom'),
                'date_de_naissance' => $request->get('date_de_naissance'),
                'job' => $request->get('job'),
                'adresse' => $request->get('address'),
                'cp' => $request->get('code_postal'),
                'town' => $request->get('ville'),
                'telephone' => $request->get('phonenumber'),
                'accroche' => $request->get('accroche'),
                'email' => $request->get('email'),
                'permis_b' => $request->get('permis'),
                'photo_profil' => $request->get('photo'),
                'password' => $request->get('password'),
                'logors' => $request->get('logo'),
                'logoci' => $request->get('logo'),
                'altci' => $request->get('name'),
            ]);

        return redirect()->to('admin/user/');
    }
}
