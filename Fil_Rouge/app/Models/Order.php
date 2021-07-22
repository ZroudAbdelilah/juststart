<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        // '',
        'qte',
        'total_p'
    ];
    public function users(){
        return $this->hasOne(User::class);
    }
}