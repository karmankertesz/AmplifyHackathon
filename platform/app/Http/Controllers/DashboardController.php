<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\Matter;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    public function index(): Response
    {
        return Inertia::render('Dashboard', [
            'mattersCount' => Matter::all()->count(),
            'lawyersCount' => Lawyer::all()->count(),
            'mattersStats' => Matter::query()->select(DB::raw('count(*) as cnt, service'))->groupBy('service')->get(),
        ]);
    }


    //
}
