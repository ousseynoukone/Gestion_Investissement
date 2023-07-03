<?php

namespace App\Http\Controllers;

use App\Models\Investissement;
use App\Models\Projet;
use Illuminate\Http\Request;


class ProjetStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
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
        $projet = Projet::find($id);
        $investissements = Investissement::where('projet_id',$projet->id)->get();
         $check = false;
        foreach ($investissements as  $investissement) {

            if($investissement->etat==0){
                $check = true;
            }
        
        }

        if($check){
            return redirect()->back()->with('tostr', "Impossible de démarrer un projet dont le ou les investissements n'ont pas été validés !");

        }

        if( count($investissements)!=0)  { 
            if($projet->statut==0)
            {
                $projet->statut=1;
                $projet->update();
                return (redirect()->route('projets.index')->with('tostrSucess',"Projet demarré avec sucess ! "));
    
            }else{
                $projet->statut=2;
                $projet->update();
                return (redirect()->route('projets.index')->with('tostrSucess',"Projet achevé avec sucess ! "));
    
    
            }
        }else{
            return (redirect()->route('projets.index')->with('tostr',"Impossible de démarer un projet qui n'as pas recu d'investissement"));
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
