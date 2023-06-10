<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Ville;


class Ecole extends Model
{
    use HasFactory;
    public $table = "ecoles";
    protected  $primaryKey = 'id';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nom',
        'id_ville',
        'is_deleted',
    ];

    public function belongsToVille()
    {
        return $this->belongsTo(Ville::class, 'id_ville', 'id');
    }
}
