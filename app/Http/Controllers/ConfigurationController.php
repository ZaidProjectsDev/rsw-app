<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Part;
use Auth;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configurations = Configuration::all();
        return view ('configurations.index', compact('configurations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user()->id;


        $cpus= Part::where('type_id','=','1')->get();
        $gpus= Part::where('type_id','=','2')->get();
        $igpus= Part::where('type_id','=','3')->get();
        $rams= Part::where('type_id','=','4')->get();
        $storages= Part::where('type_id','=','5')->get();
        $pcis= Part::where('type_id','=','6')->get();
        $selected_cpu= Part::where('type_id','=','1')->get()->first()->id;
        $selected_gpu= Part::where('type_id','=','2')->get()->first()->id;
        $selected_igpu= Part::where('type_id','=','3')->get()->first()->id;
        $selected_ram= Part::where('type_id','=','4')->get()->first()->id;
        $selected_storage= Part::where('type_id','=','5')->get()->first()->id;
        $selected_pci= Part::where('type_id','=','6')->get()->first()->id;


        return view('configurations.create', compact('cpus','gpus','igpus','rams','storages','pcis','user','selected_cpu'
        ,'selected_gpu','selected_igpu', 'selected_ram','selected_storage','selected_pci'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Configuration $hardwareConfiguration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Configuration $hardwareConfiguration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuration $hardwareConfiguration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuration $hardwareConfiguration)
    {
        //
    }
}
