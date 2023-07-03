<?php

namespace App\Http\Controllers;

use App\Models\investissement;
use App\Models\Projet;
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
    public function index(Request $request )
    {
        $id  = $request->get('id');
        $investissement = investissement::find($id);
        if($investissement->projet->statut==0)
        {
            
            $investissement->delete();

            return redirect()->route("entrepreneurs.index")->with('tostr',"Investissement annulé ! ");
        }else {
            return (redirect()->back()->with('tostr',"Annulation Impossible, Projet déjà démarré"));
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    { 
        $id  = $request->get('id');
        $investissement = investissement::find($id);
        if($investissement->projet->statut==0)
        {
            
            $investissement->delete();

            return redirect()->route("investisseurs.index")->with('tostr',"Investissement annulé ! ");
        }else {
            return (redirect()->back()->with('tostr',"Annulation Impossible, Projet déjà démarré"));
        }
        
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
            'partDeParticipation' => 'required|numeric|max:100|min:1',
               
        ]);

        $validatedData['date_investissement'] = $currentDate;
        $validatedData['investisseur_id'] = Auth::user()->id;
        $validatedData['entrepreneur_id'] = $request->input('entrepreneur_id');
        $validatedData['etat'] = false;

        $investissement = investissement::create($validatedData); 
        $projet =Projet::find($request->input('projet_id'));
        $projet->investissement_id = $investissement->id;
        $projet->update();

        return(redirect()->route('investisseurs.index')->with('tostr',"Proposition d'investissement envoyé ! "));

    }

    /**
     * Display the specified resource.
     */
    public function show(investissement $investissement)
    {    if(Auth::user()->role=="entrepreneur")
        {
            return (view('pages.entrepreneurs.investissement.investissement_detail',compact('investissement')));

        }else{
            return (view('pages.investisseurs.investissement.investissement_detail',compact('investissement')));

        }
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
        $investissement->etat = true;
        $investissement->update();
        return(redirect()->route('entrepreneurs.index')->with('tostr',"Investissement approuvé ! "));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(investissement $investissement)
    {
        //
    }
}
