<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdepart extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function department(){
        return $this->belongsTo(Department::class);
    }

}
