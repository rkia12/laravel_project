<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    public $table = "matieres";

            /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'fichier_scol',
        'nom_matiere',
        'id_classe',
        'is_deleted',
    ];

    public function belongsToClasse()
    {
        return $this->belongsTo(Classe::class,'id_classe','id');
    }
}
