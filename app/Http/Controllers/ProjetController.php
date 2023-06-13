<?php

namespace App\Http\Controllers;

use App\Models\projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role=="entrepreneur")
        {   $projets = Projet::where('user_id',Auth::user()->id) ->paginate(5);
            $currentDate = date('Y-m-d');
            $currentDatePlusOne = date('Y-m-d', strtotime($currentDate . ' +1 day'));

     
            return view('pages.entrepreneurs.projets',compact('projets', 'currentDate', 'currentDatePlusOne'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required|regex:/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s\S\p{P}:,\')("&\-_;]{1,50}(?![\p{P}\s])$/u',
            'description' => 'required|regex:/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s\S\p{P}:,\')("&\-_;]{1,200}(?![\p{P}\s])$/u',
            'cout' => 'required|numeric|min:1000',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);
        $validatedData['user_id'] = auth()->user()->id;

    
        // Create the project
        $project = Projet::create($validatedData);
    
        return (redirect()->route('projets.index'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(projet $projet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projet $projet)
    {
        //
    }
}
