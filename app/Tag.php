<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
        public function blog()
    {
    	return $this->belongsToMany(Blog::class);
    }
}
