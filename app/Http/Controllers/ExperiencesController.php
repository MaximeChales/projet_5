<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExperiencesRepository;
use App\Models\Experience;

class ExperiencesController extends Controller
{
    public function index(ExperiencesRepository $experiences)
    {
       $experiences_info = $experiences->getInfo(1);
        return  view('experiencesadmin', compact('experiences_info'));
    }

    public function update(Request $request)
    {
        Experience::updateOrCreate(['id' => $request->get('id')],
            [   
                'user_id' => 1,
                'id' => $request->get('id'),
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
            'success' => $result
            
        ]);
    }
}
