<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjetsRepository;
use App\Models\Projet;
class ProjetsController extends Controller


{
 
    public function index(ProjetsRepository $projets)
    {
       $projets_info = $projets->getInfo(1);
        return  view('projetsadmin', compact('projets_info'));
    }

    public function update(Request $request)
    {
            $count = count($request->get('slide'));
        for($i = 0 ; $i < $count ; $i++) {
            Projet::updateOrCreate(['id' => $request->get('id')[$i]],
                [
                    'image' => $request->get('slide')[$i],
                    'url' => $request->get('linkprojets')[$i],
                    'titre' => $request->get('titreprojet')[$i]
                ]);
                return redirect()->to('admin/projets/'); 
        }

    }
  
}

