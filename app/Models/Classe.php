<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Ecole;


class Classe extends Model
{
    use HasFactory;
    public $table = "classes";
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomClasse',
        'id_ecole',
        'is_deleted',
    ];

    public function belongsToEcole()
    {
        return $this->belongsTo(Ecole::class,'id_ecole','id');
    }

}
