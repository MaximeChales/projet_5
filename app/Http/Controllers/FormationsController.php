<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Repositories\ContactRepository;
use App\Repositories\FormationsRepository;
use Illuminate\Http\Request;

class FormationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(FormationsRepository $formations, ContactRepository $contact)
    {
        $auth = auth()->user();
        $formations_info = $formations->getInfo($auth->id);
        $contact_info = $contact->getInfo($auth->id);
        return view('formationsadmin', compact('formations_info', 'contact_info'));
    }

    public function update(Request $request)
    {
        $auth = auth()->user();

        $this->validate($request, [
            'formation.*' => 'required',
            'societe.*' => 'required',
            'debut.*' => 'required|date',
            'fin.*' => 'required|date',
            'descriptif.*' => 'required',
        ]);
        $count = count($request->get('formation'));
        for ($i = 0; $i < $count; $i++) {

            Formation::updateOrCreate(['id' => $request->get('id')[$i]],
                [
                    'user_id' => $auth->id,
                    'id' => $request->get('id')[$i],
                    'titre' => $request->get('formation')[$i],
                    'societe' => $request->get('societe')[$i],
                    'ville' => $request->get('ville')[$i],
                    'debut' => $request->get('debut')[$i],
                    'fin' => $request->get('fin')[$i],
                    'descriptif' => $request->get('descriptif')[$i],

                ]);
        }
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
