<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FormationsRepository;

class FormationsController extends Controller
{
    public function index(FormationsRepository $formations)
    {
       $formations_info = $formations->getInfo(1);
        return  view('formationsadmin', compact('formations_info'));
    }
}
