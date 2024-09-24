<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

}



