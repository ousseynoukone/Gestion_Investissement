<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Investissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
         $investissements = Investissement::where('investisseur_id',Auth::user()->id)->get();
        return (view('pages.investisseurs.home',compact('investissements')));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annonce = Annonce::with('projet')->with('user')->find($id);
        return (view('pages.investisseurs.detailFolder.annonce-detail',compact('annonce')));
    
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
