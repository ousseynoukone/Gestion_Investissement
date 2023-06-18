<?php

namespace App\Http\Controllers;

use App\Models\Investissement;
use App\Models\Projet;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class EntrepreneursController extends Controller
{
    /**
     * Display a listing of the resouerce.
     */
    public function index()
    {    
        
$investissements = Investissement::where('entrepreneur_id', Auth::user()->id)->paginate(5);
        return (view('pages.entrepreneurs.home',compact('investissements')));
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
