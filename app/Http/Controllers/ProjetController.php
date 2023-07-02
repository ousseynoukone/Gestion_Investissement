<?php

namespace App\Http\Controllers;

use App\Models\projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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

     
            return view('pages.entrepreneurs.projets',compact('projets','currentDate'));
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
            'libelle' => 'required|regex:/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s\S\p{P}:,\')("&\-_;]{1,100}(?![\p{P}\s])$/u',
            'description' => 'required|regex:/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s\S\p{P}:,\')("&\-_;]{1,400}(?![\p{P}\s])$/u',
            'cout' => 'required|numeric|min:1000',
            'date_debut' => 'required|date',
            'date_fin' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $dateDebut = $request->input('date_debut');
                    if ($value < $dateDebut) {
                        $fail('La date de fin doit être postérieure à la date de début.');
                    }
                    if (strtotime($value) == strtotime($dateDebut)) {
                        $fail('La date de fin doit être au moins un jour après la date de début.');
                    }
                },
            ],        ]);
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
        $project = Projet::with('investissement')->with('investisseur')->find($projet->id);
        return($project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projet $projet)
    {             $currentDate = date('Y-m-d');
        return(view('pages.entrepreneurs.editFolder.projet-edit',compact('currentDate','projet')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projet $projet)
    { 
        $validatedData = $request->validate([
            'libelle' => 'required|regex:/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s\S\p{P}:,\')("&\-_;]{1,100}(?![\p{P}\s])$/u',
            'description' => 'required|regex:/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9\s\S\p{P}:,\')("&\-_;]{1,400}(?![\p{P}\s])$/u',
            'cout' => 'required|numeric|min:1000',
            'date_debut' => 'required|date',
            'date_fin' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $dateDebut = $request->input('date_debut');
                    if ($value < $dateDebut) {
                        $fail('La date de fin doit être postérieure à la date de début.');
                    }
                    if (strtotime($value) == strtotime($dateDebut)) {
                        $fail('La date de fin doit être au moins un jour après la date de début.');
                    }
                },
            ],
               
        ]);
    
        $projet->update($validatedData);
    
        return redirect()->route('projets.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projet $projet)
    {  

        if($projet->annonce!=null || $projet->investissement!=null )
        {
            return redirect()->route('projets.index')->with('tostr',"Impossible de supprimer un projet qui une annonce ou un investissement ! ");
        }
        $projet->delete();

        return(redirect()->route('projets.index'));
    }
}
