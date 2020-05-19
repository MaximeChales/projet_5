<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Repositories\FormationsRepository;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(FormationsRepository $formations)
    {
        $user = auth()->user();
        $formations_info = $formations->getInfo($user->id);
        return view('formationsadmin', compact('formations_info'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        Formation::updateOrCreate(['id' => $request->get('id')],
            [
                'user_id' => $user->id,
                'id' => $request->get('id'),
                'user_id' => 1,
                'titre' => $request->get('formation'),
                'societe' => $request->get('societe'),
                'ville' => $request->get('ville'),
                'debut' => $request->get('debut'),
                'fin' => $request->get('fin'),
                'descriptif' => $request->get('descriptif'),

            ]);
        return redirect()->to('admin/formations/');

    }

    public function delete(Request $request)
    {
        $result = Formation::destroy($request->id);
        return response()->json([
            'success' => $result,

        ]);
    }
}
