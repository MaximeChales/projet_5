<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjetsRepository;

class ProjetsController extends Controller
{
    public function index(ProjetsRepository $projets)
    {
       $projets_info = $projets->getInfo(1);
        return  view('projetsadmin', compact('projets_info'));
    }
}
