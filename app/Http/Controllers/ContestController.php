<?php

namespace App\Http\Controllers;

use App\Models\Contest;

class ContestController extends Controller
{
    public function index()
    {
        return Contest::all();
    }
}
