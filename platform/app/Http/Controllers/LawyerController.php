<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LawyerController extends Controller
{
    public function index() : Response
    {
        return Inertia::render('Lawyers/Index', [
            'lawyers' => Lawyer::all()
        ]);
    }
}
