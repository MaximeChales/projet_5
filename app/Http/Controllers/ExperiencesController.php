<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ExperiencesRepository;

class ExperiencesController extends Controller
{
    public function index(ExperiencesRepository $experiences)
    {
       $experiences_info = $experiences->getInfo(1);
        return  view('experiencesadmin', compact('experiences_info'));
    }
}
