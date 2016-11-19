<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    
    /**
     * A program can have many recipes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
    	return $this->belongsToMany('App\Recipe')->withPivot('day');
    }
}
