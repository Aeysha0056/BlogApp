<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['tagname'];
    
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
