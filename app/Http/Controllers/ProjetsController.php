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
        Projet::updateOrCreate(['id' => $request->get('id')],
            [
                'id' => $request->get('id'),
                'image' => $request->get('slide'),
                'url' => $request->get('linkprojects'),
                'titre' => $request->get('titreprojets')
            ]);

    }
}
