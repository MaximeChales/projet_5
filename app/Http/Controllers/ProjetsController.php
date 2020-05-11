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

    public function uploadForm()
    {
        return view('projetsadmin');
    }
    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'url' => 'required',
            'titre' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                //dd($check);
                if ($check) {
                    $items = Item::create($request->all());
                    foreach ($request->photos as $photo) {
                        $filename = $photo->store('images');
                        ItemDetail::create([
                            'item_id' => $items->id,
                            'filename' => $filename,
                        ]);
                    }
                    echo "Upload Successfully";
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                }
            }
        }
    }
  
}

