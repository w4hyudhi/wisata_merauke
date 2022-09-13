<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wisata;

class Fasilitas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function wisata(){
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
