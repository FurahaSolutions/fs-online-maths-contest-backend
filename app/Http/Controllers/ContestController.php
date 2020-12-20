<?php

namespace App\Http\Controllers;

use App\Models\Contest;

class ContestController extends Controller
{
    public function index()
    {
        return Contest::all();
    }

    public function show(Contest $contest)
    {
        $response = $contest->getDetails();
        $editions = [];
        foreach ($contest->editions as $edition) {
            $editions[] = $edition->getDetails();
        }
        $response['editions'] = $editions;
        return response()->json($response);
    }
}
