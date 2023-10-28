<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'release_date' => 'required|date',
            'publisher' => 'required|max:255',
            'developer' => 'required|max:255',
        ]);

        // Create a new game record in the database
        $game = new Game([
            'title' => $request->input('title'),
            'release_date' => $request->input('release_date'),
            'publisher' => $request->input('publisher'),
            'developer' => $request->input('developer'),
        ]);

        $game->save();

        // Redirect to a success page or any other action
        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $game = Game::where('id' ,'=', $id)->first();

        return view('games.show', compact('game'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
