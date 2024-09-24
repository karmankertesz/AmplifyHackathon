<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MatterController extends Controller
{
   
    public function index(): Response
    {
        return Inertia::render('Matters/Index', [
            'matters' => Matter::all()
        ]);
    }


    public function matcher()
    {
        return Inertia::render('Matters/Matcher');
    }

}



