<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Repositories\ContactRepository;
use App\Repositories\ProjetsRepository;
use Illuminate\Http\Request;

class ProjetsController extends Controller
{
    //restreint l'accès à ceux qui sont connéctés
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ProjetsRepository $projets, ContactRepository $contact)
    {
        $auth = auth()->user();

        $projets_info = $projets->getInfo($auth->id);
        $contact_info = $contact->getInfo($auth->id);


        return view('projetsadmin', compact('projets_info', 'contact_info'));
    }

    /**
     * Mise à jour des projets
     * @param Request $request
     */
    public function update(Request $request,ProjetsRepository $projets, ContactRepository $contact)
    {

        if ($request->hasFile('slide')) {
            $files = $request->file('slide');
            foreach ($files as $key => $file) {
                $filename[$key] = $file->getClientOriginalName();
                $file->move(base_path() . './public/img', $filename[$key]);
            }
        }

        $auth = auth()->user();
        $count = count($request->get('titreprojet'));
        // On recupere les données de la BDD sans la variable $data
        for ($i = 0; $i < $count; $i++) {
            $data = [
                'user_id' => $auth->id,
                'url' => $request->get('linkprojets')[$i],
                'titre' => $request->get('titreprojet')[$i],
                'ordre' => $request->get('ordre')[$i],
            ];

             /*On verifie que les images des reseaux sociaux sont biens remplis, auquel cas on retourne la vue useradmin
            avec une erreur*/
            if (!isset($filename[$i]) && empty($request->get('id')[$i])) {

                $auth = auth()->user();
                $projets_info = $projets->getInfo($auth->id);
                $contact_info = $contact->getInfo($auth->id);
                return view('projetsadmin', compact('projets_info', 'contact_info'))->
                withErrors(["empty_filename_error" => "Vous devez ajouter une image aux nouveaux projets avant de valider"]);
            }

            if (isset($filename[$i])) {
                $data['image'] = $filename[$i];
            }
            
            $this->validate($request, [
                'linkprojets.*' => 'required',
                'titreprojet.*'=> 'required',
                'ordre.*' => 'required|integer',
                ]);
            
            Projet::updateOrCreate(['id' => $request->get('id')[$i]], $data);
        }

        return redirect()->to('admin/projets/');
    }

    public function delete(Request $request)
    {
        $result = Projet::destroy($request->id);
        return response()->json([
            'success' => $result,

        ]);
    }
}
