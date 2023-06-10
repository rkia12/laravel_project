<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public $table = "categories";
    protected  $primaryKey = 'id';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nom',
        'id_matiere',
        'id_subCategorie',
        'is_deleted',
    ];

    public function belongsToCategorie()
    {
        return $this->belongsTo(Categorie::class, 'id_subCategorie', 'id');
    }
}
