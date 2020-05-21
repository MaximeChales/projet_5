<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjetsRepository;
use App\Models\Projet;

class ProjetsController extends Controller


{
        //restreint l'accès à ceux qui sont connéctés
        public function __construct()
        {
            $this->middleware('auth');
        }

    public function index(ProjetsRepository $projets)
    {
        $auth = auth()->user();
   
        $projets_info = $projets->getInfo($auth->id);

        return view('projetsadmin', compact('projets_info'));
    }

    /**
     * Mise à jour des projets
     * @param Request $request
     */
    public function update(Request $request)
    {      

        if ($request->hasFile('slide')) {
            $files = $request->file('slide');
            foreach ($files as $key => $file) {
                $filename[$key] = $file->getClientOriginalName();
                $file->move(base_path().'./public/img',$filename[$key]);
            }
        }

        $user = auth()->user();
        $count = count($request->get('titreprojet'));
        // On recupere les données de la BDD sans la variable $data
        for($i = 0 ; $i < $count ; $i++) {
            $data = [
                'user_id' => $user->id,
                'url' => $request->get('linkprojets')[$i],
                'titre' => $request->get('titreprojet')[$i],
                'ordre' => $request->get('ordre')[$i],
            ];

            if(isset($filename[$i])){
             $data['image'] = $filename[$i];
            }
            Projet::updateOrCreate(['id' => $request->get('id')[$i]], $data);
        }
            

        return redirect()->to('admin/projets/');
    }

    public function delete(Request $request)
    {   
        $result = Projet::destroy($request->id);
        return response()->json([
            'success' => $result
            
        ]);
    }
}

