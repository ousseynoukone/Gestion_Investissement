<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $table = 'projets';
    protected $fillable = ['libelle', 'cout', 'description','date_debut', 'date_fin', 'user_id', 'annonce_id', 'investissement_id', 'statut'];

     public function Annonce()
    {
        return ($this->belongsTo(Annonce::class));
    }

    public function Investisseur()
    {
        return ($this->belongsTo(User::class));
    }

    public function Investissement()
    {
        return ($this->belongsTo(Investissement::class));
    }
}
