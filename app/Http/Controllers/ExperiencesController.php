<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Repositories\ExperiencesRepository;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    //restreint l'accès à ceux qui sont connéctés
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(ExperiencesRepository $experiences, ContactRepository $contact)
    {
        $auth = auth()->user();
        $experiences_info = $experiences->getInfo($auth->id);
        $contact_info = $contact->getInfo($auth->id);
        return view('experiencesadmin', compact('experiences_info','contact_info'));
    }

    public function update(Request $request)
    {
        $auth = auth()->user();
        Experience::updateOrCreate(['id' => $request->get('id')],
            [
                'user_id' => $auth->id,
                'titre' => $request->get('poste'),
                'societe' => $request->get('societe'),
                'ville' => $request->get('ville'),
                'debut' => $request->get('debut'),
                'fin' => $request->get('fin'),
                'descriptif' => $request->get('descriptif'),

            ]);

        return redirect()->to('admin/experiences/');
    }

    public function delete(Request $request)
    {
        $result = Experience::destroy($request->id);
        return response()->json([
            'success' => $result,
        ]);
    }
}
