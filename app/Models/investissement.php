<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investissement extends Model
{
    use HasFactory;
    protected $table = 'investissements';

    protected $fillable = ['montant', 'investisseur_id','etat', 'entrepreneur_id', 'projet_id', 'date_investissement', 'conditions', 'partDeParticipation'];

    public function projet (){
        return $this->belongsTo(Projet::class);
     }

    public function investisseur (){
       return $this->belongsTo(User::class,'investisseur_id');
    }

    public function entrepreneur (){
        return $this->belongsTo(User::class,'entrepreneur_id');
     }
}
