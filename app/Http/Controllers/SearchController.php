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
        //Validate this request so no one hurts the server
        $request->validate(['query' => 'required|string|max:150|min:5']);

        $query = $request->input('query');

        // Perform searches on each table and get the results
        $games = Game::where('title', 'LIKE', "%$query%")->get();
        $configurations = Configuration::where('name', 'LIKE', "%$query%")->get();
        $vendors = Vendor::where('name', 'LIKE', "%$query%")->get();
        $submissions = Submission::where('name', 'LIKE', "%$query%")->get();
        $parts = Part::where('name', 'LIKE', "%$query%")->get();

        return view('search.search_results', compact('games', 'configurations', 'submissions', 'vendors', 'parts'));
    }

    public function searchByTag(Request $request, $tag)
    {
        // Example of searching for items based on a tag
        if ($tag === 'games') {
            $results = Game::where('title', 'LIKE', '%' . $request->input('query') . '%')->get();
        } elseif ($tag === 'submissions') {
            $results = Submission::where('name', 'LIKE', '%' . $request->input('query') . '%')->get();
        } else {
            // Handle other tables or tags as needed
            $results = [];
        }

        return view('search.tag_search_results', compact('results', 'tag'));
    }
    public function searchForSubmissionsByGame($game_id)
    {
        $results = Submission::where('game_id', $game_id)->get();



        return view('search.submission_game_search_results', compact('results'));

    }
}
