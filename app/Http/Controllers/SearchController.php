<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 // Replace with the actual model names for other tables
use App\Models\Game;
use App\Models\configuration;
use App\Models\Submission;
use App\Models\Vendor;
use App\Models\Part;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform searches on each table and get the results
        $games = Game::where('title', 'LIKE', "%$query%")->get();
        $configurations = Configuration::where('name', 'LIKE', "%$query%")->get();
        $vendors = Vendor::where('name', 'LIKE', "%$query%")->get();
        $submissions = Submission::where('name', 'LIKE', "%$query%")->get();
        $parts = Part::where('name', 'LIKE', "%$query%")->get();
        // Perform similar queries for other tables

        return view('search.search_results', compact('games', 'configurations', 'submissions', 'vendors', 'parts'));
    }
}
