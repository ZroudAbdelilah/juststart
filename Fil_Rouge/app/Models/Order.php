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


    /**
 * The projects that belong to the product.
 */
public function projects()
{
    return $this->belongsToMany('App\Models\Project','projects_has_orders','orders_id','projects_id');
}

    public function users(){
        return $this->hasOne(User::class,'id','users_id');
    }
}
