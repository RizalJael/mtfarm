<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Populasi extends Model
{
    use HasFactory;

    protected $table = 'populasis';

    protected $fillable = [
        'tgl',
        'jenis',
        'jkel',
        'kode',
        'induk',
        'sumber',
        'asal',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'tgl' => 'date',
    ];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'asal', 'nama');
    }
    public function mortal()
    {
        return $this->hasOne(Mortal::class, 'kode', 'kode');
    }
    public function potong()
    {
        return $this->hasOne(Potong::class, 'kode', 'kode');
    }
}
