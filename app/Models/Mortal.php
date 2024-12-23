<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mortal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl',
        'kode',
        'penyebab',
    ];
    protected $casts = [
        'tgl' => 'date',
    ];


    public function populasi()
    {
        return $this->belongsTo(Populasi::class, 'kode', 'kode');
    }
}
