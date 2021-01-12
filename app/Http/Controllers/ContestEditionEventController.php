<?php

namespace App\Http\Controllers;

use App\Models\ContestEditionEvent;
use Illuminate\Http\Request;

class ContestEditionEventController extends Controller
{
    public function show(ContestEditionEvent $contestEditionEvent, Request $request) {
        $includeQuestions =  $request->all('includeQuestions') !== null;
        return response()->json($contestEditionEvent->getDetails($includeQuestions));
    }
}
