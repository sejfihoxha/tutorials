<?php

namespace App;

/*use App\Model;*/

/*use Illuminate\Database\Eloquent\Model;*/

class Comment extends Model
{
    //

    public function post()
    {

    	return $this->belongsTo(Posts::class);
    }

        public function user()
    {

    	return $this->belongsTo(User::class);
    }
}
