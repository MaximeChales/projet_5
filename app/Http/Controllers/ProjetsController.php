<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjetsRepository;
use App\Repositories\ContactRepository;
use App\Models\Projet;
class ProjetsController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(ProjetsRepository $projets,ContactRepository $contact)
    {

        $user = auth()->user();
       $projets_info = $projets->getInfo($user->id);
       $contact_info = $contact->getInfo($user->id);
        return  view('projetsadmin', compact('projets_info','contact_info'));
        
    }

    public function update(Request $request)
    {
        $files = $request->file('slide');
        $count = count($request->get('titreprojet'));

        for($i = 0 ; $i < $count ; $i++) {
            $filename = $files[$i]->getClientOriginalName();
            $files[$i]->move(base_path().'/public/img',$filename);
            $user = auth()->user();
            Projet::updateOrCreate(['id' => $request->get('id')[$i]],
                [
                    'user_id' => $user->id,
                    'image' => '../public/img/'. $filename,
                    'url' => $request->get('linkprojets')[$i],
                    'titre' => $request->get('titreprojet')[$i]
                ]);
                return redirect()->to('admin/projets/'); 
        }

    }
    public function delete(Request $request)
    {   
        $result = Projet::destroy($request->id);
        return response()->json([
            'success' => $result
            
        ]);
    }
  
}

