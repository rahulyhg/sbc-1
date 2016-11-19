<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    /**
     * A workout belongs to a category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
