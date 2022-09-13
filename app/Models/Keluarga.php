<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jemaat()
    {
        return $this->hasMany(Jemaat::class,'keluarga_id');
    }

        public static function boot() {
        parent::boot();
        self::deleting(function($list) { // before delete() method call this
             $list->jemaat()->each(function($data) {
                $data->delete(); // <-- direct deletion
             });
        });
    }
}
