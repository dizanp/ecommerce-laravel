<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    //
	protected $fillable = [
        'name', 'slug', 'image','price','description', 'user_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
