<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usaha;

class Pedagang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function usaha(){
        return $this->hasMany(Usaha::class,'pedagang_id' );
    }
}
