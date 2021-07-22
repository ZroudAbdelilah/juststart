<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLeader extends Model
{
    use HasFactory;
    protected $tableName = "project_leader";
    protected $fillable = [
        // '',
        'username',
        'email',
        'password'

    ];
    public function adresss(){
        return $this->hasOne(Adress::class);
    }
}
