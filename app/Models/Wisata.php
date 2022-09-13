<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fasilitas;
use App\Models\Usaha;
use App\Models\Even;

class Wisata extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fasilitas(){
        return $this->hasMany(Fasilitas::class,'wisata_id' );
    }

    public function usaha(){
        return $this->hasMany(Usaha::class,'wisata_id' );
    }

    public function even(){
        return $this->hasMany(Even::class,'wisata_id' );
    }
}
