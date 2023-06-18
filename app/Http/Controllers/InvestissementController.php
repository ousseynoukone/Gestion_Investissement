<?php

namespace App\Http\Controllers;

use App\Models\investissement;
use DateTime;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InvestissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    { 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $currentDate = new DateTime();

        $validatedData = $request->validate([
            'montant' => 'required|numeric',
            'projet_id' => 'required|exists:projets,id',
            'conditions' => 'required|string|max:200',
            'partDeParticipation' => 'required|string',
               
        ]);

        $validatedData['date_investissement'] = $currentDate;
        $validatedData['investisseur_id'] = Auth::user()->id;

        $investissement = investissement::create($validatedData); 

        return(redirect()->route('investisseurs.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(investissement $investissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(investissement $investissement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, investissement $investissement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(investissement $investissement)
    {
        //
    }
}
