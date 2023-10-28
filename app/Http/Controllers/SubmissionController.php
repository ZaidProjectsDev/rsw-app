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
        if(Auth::user() == null)
        {
            return  view ('auth.login');
        }
        $user = Auth::user()->id;

        $submision = new Submission();



        $configurations = Configuration::where('user_id','=',$user)->get();
        if($configurations.count() <1)
        {

        }
        try {
            $selected_configuration = Configuration::where('user_id', '=', $user)->get()->first()->id;
        }
        catch (\ErrorException)
        {
            $selected_configuration = 0;
        }
        $games= Game::all();
        $selected_game = $games->first()->id;

        return view('submissions.create', compact('submision','configurations', 'selected_configuration', 'games', 'selected_game'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([

            'name' => 'required',

            'description' => 'required',

            'game_id'=> 'required',

            'configuration_id' => 'required',


        ]);

        $user_id = Auth::user()->id;
        $request->request->add(['user_id'=>$user_id ]);

        Submission::create($request->all());



        return redirect()->route('submissions.index')

            ->with('success','Product created successfully.');
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
