<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [];
    //protected $fillable = ['title','image'];  

    public function subdepartments(){
        return $this->hasMany(Subdepart::class,'department_id');
    }
}
