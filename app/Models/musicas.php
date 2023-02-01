<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class musicas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'title_short',
        'preview',
        'duration',
        'cover_small',
        'estado',
    ];
}
