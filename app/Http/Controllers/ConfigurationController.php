<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Part;
use App\Models\Submission;
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
        if(Auth::user() == null)
        {
          return  view ('auth.login');
        }
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
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            // Add validation rules for other fields if needed
        ]);

        // Create a new configuration
        $configuration = new Configuration([
            'name' => $validatedData['name'],
            // Add other fields as needed
        ]);

        // Associate the configuration with the currently authenticated user
        $configuration->user_id = auth()->user()->id;

        // Save the configuration to the database
        $configuration->save();

        // Get the selected parts' type IDs from the request
        $typeIds = [
            'cpu' => $request->input('cpu_id'),
            'gpu' => $request->input('gpu_id'),
            'igpu' => $request->input('igpu_id'),
            'ram' => $request->input('ram_id'),
            'storage' => $request->input('storage_id'),
            'pci' => $request->input('pci_id'),
        ];

        // Attach selected parts to the configuration based on their type IDs
        foreach ($typeIds as $type => $typeId) {
            if ($typeId) {
                // Find the part with the matching type_id
                $part = Part::where('type_id', $typeId)->first();
                if ($part) {
                    // Attach the part to the configuration using the pivot table
                    $configuration->parts()->attach($part->id);
                }
            }
        }

        return redirect()->route('configurations.index')
            ->with('success', 'Configuration created successfully.');
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
