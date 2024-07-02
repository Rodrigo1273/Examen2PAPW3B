<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'fecha_publicacion', 'autor_id', 'precio'];

    /**
     * Get the autor that owns the Libro.
     */
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}



