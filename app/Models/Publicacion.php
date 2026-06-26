<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = "publicaciones";
    protected $fillable = [
        "user_id",
        "ruta",
        "descripcion"
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
