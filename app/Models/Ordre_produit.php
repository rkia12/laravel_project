<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordre_produit extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_ordre',
        'id_produit',
        'quantite',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function ordre()
    {
        return $this->belongsTo(Order::class);
    }

}
