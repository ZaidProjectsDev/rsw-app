<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Game;
use App\Models\Part;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user() == null)
        {
            return  view ('auth.login');
        }
        $submissions = Submission::all();
        $configurations = Configuration::all();
        return view('submissions.index', compact('submissions', ));
        //
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


        $selected_configuration = Configuration::where('user_id','=',$user)->get()->first()->id;

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
        $request->request->add(['user_id'=>$user_id]);

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
        $submission = Submission::where('id', '=',$id)->get()[0];
        return view ('submissions.show', compact('submission'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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
