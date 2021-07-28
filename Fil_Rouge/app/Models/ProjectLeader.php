<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;
class ProjectLeader extends Model
{
    use HasFactory;
    protected $table = "project_leader";
    public $timestamps = false;
    protected $fillable = [
        // '',
        'adresss_id',
        'username',
        'email',
        'password',
        'token'
    ];
    public function adresss(){
        return $this->hasOne(Adress::class);
    }
}
