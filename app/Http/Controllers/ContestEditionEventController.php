<?php

namespace App\Http\Controllers;

use App\Models\ContestEditionEvent;
use Illuminate\Http\Request;

class ContestEditionEventController extends Controller
{
    public function show(ContestEditionEvent $contestEditionEvent) {
        return response()->json($contestEditionEvent->getDetails());
    }
}
