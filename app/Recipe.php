<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    
	/**
     * A recipe belongs to a meal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal()
    {
    	return $this->belongsTo('App\Meal');
    }
    
    /**
     * A recipe can have many ingredients.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredients()
    {
    	return $this->belongsToMany('App\Ingredient')->withPivot('quantity','unit','note');
    }
    
    /**
     * A recipe can be attached to many programs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programs()
    {
    	return $this->belongsToMany('App\Program')->withPivot('day');
	 }
    
    /**
     * A recipe can be linked to many foods.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foods()
    {
    	return $this->belongsToMany('App\Food');
    }
    
}
