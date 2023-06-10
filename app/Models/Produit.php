<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categorie;

class Produit extends Model
{
    use HasFactory;
    public $table = "produits";

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'photo',
        'size',
        'couleur',
        'quantite',
        'id_categorie',
        'id_pack',
        'is_deleted'
    ]; 

    public function belongsToCategorie()
    {
        return $this->belongsTo(Categorie::class,"id_categorie","id");
    }

    public function belongsToPack(){
        return $this->belongsTo(Pack::class,"id_pack","id");
    }


}
