<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Order extends Model
{
    use HasFactory;

    public $table = "orders";
    protected  $primaryKey = 'id';


        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_utilisateur',
        'prix_total',
        'status',
        'created_at',
        'is_deleted'
    ];

    public function belongToUilisateur()
    {
        return $this->belongsTo(User::class,'id_utilisateur','id');
    }


}
