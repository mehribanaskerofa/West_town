<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table='blocks';
    protected $guarded=[];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
    public function houses()
    {
        return $this->hasMany(House::class,'block_id','id');
    }
}
