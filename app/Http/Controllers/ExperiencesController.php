<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Repositories\ExperiencesRepository;
use Illuminate\Http\Request;

class ExperiencesController extends Controller
{
    public function index(ExperiencesRepository $experiences)
    {
        $user = auth()->user();
        $experiences_info = $experiences->getInfo($user->id);
        return view('experiencesadmin', compact('experiences_info'));
    }

    public function update(Request $request)
    {
        Experience::updateOrCreate(['id' => $request->get('id')],
            [
                'user_id' => $request->id,
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
