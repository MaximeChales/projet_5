<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CentresInteretRepository;
use App\Models\CentresInteret;

class CentresInteretController extends Controller


{
        //restreint l'accès à ceux qui sont connéctés
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function delete_ci(Request $request)
        {
            $result = CentresInteret::destroy($request->id);
            return response()->json([
                'success' => $result,
            ]);
        }

}

