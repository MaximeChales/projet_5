<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FormationsRepository;
use App\Models\Formation;
class FormationsController extends Controller
{
    public function index(FormationsRepository $formations)
    {
       $formations_info = $formations->getInfo();
        return  view('formationsadmin', compact('formations_info'));
    }

    public function update(Request $request)
    {

        Formation::updateOrCreate(['id' => $request->get('id')],
            [
                'id' => $request->get('id'),
                'user_id' => 1,
                'titre' => $request->get('formation'),
                'societe' => $request->get('societe'),
                'ville' => $request->get('ville'),
                'debut' => $request->get('debut'),
                'fin' => $request->get('fin'),
                'descriptif' => $request->get('descriptif')
                
            ]);
            return redirect()->to('admin/formations/'); 

    }

    public function delete(Request $request)
    {

        Formation::delete(['id' => $request->forceDelete()],
            [
                'id' => $request->get('id'),
                'titre' => $request->get('formation'),
                'ville' => $request->get('ville'),
                'debut' => $request->get('debut'),
                'fin' => $request->get('fin'),
                'descriptif' => $request->get('descriptif')
                
            ]);
            return redirect()->to('admin/formations/'); 
    }
}
