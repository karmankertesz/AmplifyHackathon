<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use App\Services\MatcherService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;

class MatterController extends Controller
{
    private $matcherService;

    public function __construct(MatcherService $matcherService)
    {
        $this->matcherService = $matcherService;
    }

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

    public function getMatchingLawyers(Request $request)
    {
        $brief =  $request->get('brief');
        $lawyers = $this->matcherService->getMatchingMattersGroupedByLawyer($brief);
        return Redirect::back()->with([
            'data' => [
                'matchingLawyers' => $lawyers,
            ],
        ]);
    }

}



