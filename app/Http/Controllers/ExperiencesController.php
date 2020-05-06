<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExperiencesRepository;
use App\Models\Experience;

class ExperiencesController extends Controller
{
    public function index(ExperiencesRepository $experiences)
    {
       $experiences_info = $experiences->getInfo('id');
        return  view('experiencesadmin', compact('experiences_info'));
    }

    public function update(Request $request)
    {
        Experience::updateOrCreate(['id' => $request->get('id')],
            [
                'id' => $request->get('id'),
                'titre' => $request->get('formation'),
                'societe' => $request->get('societe'),
                'ville' => $request->get('ville'),
                'debut' => $request->get('debut'),
                'fin' => $request->get('fin'),
                'descriptif' => $request->get('descriptif'),
            ]);

    }
}
