<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'estado',
        'asunto',
        'destino',
        'cuerpo',
        
    ];


    public function remitente()
    {
        return $this->hasOne(USer::class,'id','user_id');
    }
}
