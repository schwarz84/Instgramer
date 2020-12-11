<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $table = 'images';

    //Relacion Many to One
    public function user() {

        return $this->belongsTo('App\User', 'user_id');
    }

    // Relacion one to Many
    public function comments() {

        return $this->hasMany('App\Comment')->orderby('id', 'desc');
    }

    public function likes() {

        return $this->hasMany('App\Like');
    }


}
