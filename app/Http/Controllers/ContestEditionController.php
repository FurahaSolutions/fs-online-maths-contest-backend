<?php

namespace App\Http\Controllers;

use App\Models\ContestEdition;
use Illuminate\Http\Request;

class ContestEditionController extends Controller
{
    public function index() {
        $request = \request()->all();
        $featured = key_exists('featured', $request) && $request['featured'];
        $size = key_exists('size', $request) ? $request['size'] : 15;

        if ($featured) {
            $contestEditions = ContestEdition::paginate($size);
            $response = [];
            foreach ($contestEditions as $contestEdition) {
                $response[] = [
                    'id' => $contestEdition->id,
                    'contestId' => $contestEdition->contest_id,
                    'description' => $contestEdition->description,
                    'edition' => $contestEdition->edition,
                    'name' => $contestEdition->name,
                    'status' => $contestEdition->status,
                    'contestName' => $contestEdition->contest->name,
                    'contestDescription' => $contestEdition->contest->description,
                    'createdAt' => $contestEdition['created_at']
                ];
            }
            return response()->json($response); // ToDo-me define definition for featured contests
        }
        return response()->json(request()->all());
    }
}
