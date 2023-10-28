<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Game;
use App\Models\Part;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return view('auth.login');
        }

        // Get the authenticated user's ID
        $user_id = Auth::user()->id;

        // Query the submissions that are visible to everyone or belong to the authenticated user
        $submissions = Submission::where(function($query) use ($user_id) {
            $query->where('visible', true)  // Visible to everyone
            ->orWhere('user_id', $user_id);  // Belong to the authenticated user
        })->get();

        $configurations = Configuration::all();

        return view('submissions.index', compact('submissions', 'configurations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $configurations = Configuration::all(); // Get a list of all configurations
        $games = Game::all(); // Get a list of all games

        return view('submissions.create', compact('configurations', 'games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'configuration_id' => 'required|exists:configurations,id',
            'game_id' => 'required|exists:games,id',
            'visible' => 'boolean', // Assuming visibility is a boolean field
        ]);

        $submission = new Submission([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'configuration_id' => $request->input('configuration_id'),
            'game_id' => $request->input('game_id'),
            'visible' => $request->input('visible', false), // Set to false if not provided
        ]);

        // Assign the currently authenticated user to the submission
        $submission->user_id = auth()->user()->id;

        $submission->save();

        return redirect()->route('submissions.index')->with('success', 'Submission created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //This might be not to standard, find a better solution later in polishing phase.
        $submission = Submission::where('id', '=', $id)->first();
         if($submission == null)
         {
             return back();
         }
        return view ('submissions.show', compact('submission'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $submission = Submission::find($id);
        $configurations = Configuration::where('id', $submission->configuration_id)->get();
        $selected_configuration = $submission->configuration_id;
        $games = Game::all();
        $selected_game = $submission->gameId;
        if(!$submission)
        {
            return view('home');
        }
       return View::make('submissions.edit')->with('submission',$submission)
           ->with('configurations',$configurations)
           ->with('selected_configuration', $selected_configuration)
        ->with('games', $games)
        ->with('selected_game', $selected_game);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $submission = Submission::find($id);
        if($submission)
        {
            if($submission->visible)
            {
                $submission->visible = 0;
            }
            else{
                $submission->visible = 1;
            }
            $submission->save();
        }
        return back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
