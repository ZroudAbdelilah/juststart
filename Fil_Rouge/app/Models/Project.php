<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'target_b',
        'description',
        'd_line',
        'thumbnail',
        'invested',
        'categorys_id',
        'project_leader_id'
    ];


    public function categorys(){
        return $this->belongsTo(Category::class);
    }
    public function project_leader(){
        return $this->belongsTo(ProjectLeader::class);
    }


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','tags_has_projects','projects_id','tags_id');
    }


}
