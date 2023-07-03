<?php

namespace App\Http\Controllers;

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
        dd($projet->investissement);

        if($projet->investissement->etat==0){
            return (redirect()->back()->with('tostr',"Impossible de démarer un projet dont l'investissement n'as pas été validé ! "));

        }

        if( $projet->Investissement!=null)  { 
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
