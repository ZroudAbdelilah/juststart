<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "adresss";

    protected $fillable = [
        'county',
        'state',
        'city',
        'street',
        'p_code'

    ];

    
}
