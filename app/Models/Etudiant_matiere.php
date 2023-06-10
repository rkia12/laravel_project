<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\User;
use App\Models\Matiere;


class Etudiant_matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_matiere',
        'id_etudiant',
    ];


    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }


}
