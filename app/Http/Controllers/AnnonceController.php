<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Projet;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role=="entrepreneur")
        {   
            $annonces = Annonce::where('user_id',Auth::user()->id)->paginate(5);
            $projets = Projet::where('user_id',Auth::user()->id)->get() ;
                        return view("pages.entrepreneurs.annonce",compact('annonces','projets'));
        }else{
            $annonces = Annonce::paginate(5);
            return view('pages.investisseurs.annonce',compact('annonces'));
        }
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

        //controle de saisie doit etre fait ! 

        $currentDate = new DateTime();

        $annonces = new Annonce();
        $annonces->libelle = $request->get('libelle');
        $annonces->cout = $request->get('cout');
        $annonces->user_id = Auth::user()->id;
        $annonces->projet_id = $request->get('projet_id');
        $annonces->date_pub =  $currentDate;


        $annonces->save();

        $projet = Projet::find($request->get('projet_id'));
        $projet->annonce_id = $annonces->id  ;
        $projet->update();

        return(redirect()->route('annonces.index'));
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
