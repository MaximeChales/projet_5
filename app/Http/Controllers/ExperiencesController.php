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

        $this->validate($request, [
            'poste.*' => 'required',               
            'societe.*' => 'required',
            'ville.*' => 'required',   
            'debut.*'=> 'required|date',
            'fin.*' => 'required|date',
            'descriptif.*'=> 'required',
        ]);

        $count = count($request->get('poste'));
        for ($i = 0; $i < $count; $i++) {
        Experience::updateOrCreate(['id' => $request->get('id')[$i]],
            [
                'user_id' => $auth->id,
                'titre' => $request->get('poste')[$i],
                'societe' => $request->get('societe')[$i],
                'ville' => $request->get('ville')[$i],
                'debut' => $request->get('debut')[$i],
                'fin' => $request->get('fin')[$i],
                'descriptif' => $request->get('descriptif')[$i],

            ]);
        }

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
