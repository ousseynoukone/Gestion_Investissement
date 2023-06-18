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
        }else if(Auth::user()->role=="investisseur"){
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
        $validatedData = $request->validate([
            'libelle' => 'required |max:400' ,
            'projet_id' => 'required | numeric' ,

            'cout' => 'required | numeric' 
        ]
        );
        $projet = Projet::find($request->get('projet_id'));

        $currentDate = new DateTime();

        $annonces = new Annonce();
        $annonces->libelle = $request->get('libelle');
        $annonces->cout = $projet->cout;
        $annonces->user_id = Auth::user()->id;
        $annonces->projet_id = $request->get('projet_id');
        $annonces->date_pub =  $currentDate;


        $annonces->save();

        $projet->annonce_id = $annonces->id  ;
        $projet->update();

        return(redirect()->route('annonces.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annonce =Annonce::with('projet')->find($id);
        $projets = Projet::where('user_id',Auth::user()->id)->get() ;

        return (view('pages.entrepreneurs.editFolder.annonce-edit',compact('annonce','projets')));
        
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
                //controle de saisie doit etre fait ! 
                $validatedData = $request->validate([
                    'libelle' => 'required |max:400' ,
                    'projet_id' => 'required | numeric' ,
        
                    'cout' => 'required | numeric' 
                ]
                );

                $annonce = Annonce::find($id);
                $projet = Projet::find($request->get('projet_id'));
                // if ($projet->annonce && $projet->annonce->id!=$annonce->id ) {
                //     return back()->with('erreur', 'Ce projet a déja une annonce dédiée');
                // }
                //On doit enlever l'id de l'annonce dont on retire l'annonce
                $projetB = Projet::find($annonce->projet->id);
                if($projetB)
                {
                    $projetB->annonce_id=0;
                    $projetB->update();
                }

           

        
        
                $annonce->update(  $validatedData);
        
                $projet->annonce_id = $annonce->id  ;
                $projet->update();
        return(redirect()->route('annonces.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annonce = Annonce::find($id);
        $annonce->delete();
        return(redirect()->route('annonces.index'));
    }
}
