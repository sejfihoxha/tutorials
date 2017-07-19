<?php


namespace App;


use Illuminate\Database\Eloquent\Model;
/*use App\Model;
*/
class Posts extends Model
{
    //
      protected $guarded=[];

      // e krijon lidhjen ne mese te tabelave post dhe comments
      public function comments()
      {

      	return $this->hasMany(Comment::class);
      }

      public function user()
    {

      return $this->belongsTo(Posts::class);
    }

      public function addComment($body)
      {

      	$this->comments()->create(compact('body'));

      }

      public static function archives()
      {

        return static::selectRaw('year(created_at) year ,monthname(created_at) month , count(*) published')
              ->groupBy('year','month')
              ->orderByRaw('min(created_at) desc')
              ->get()
              ->toArray();
      }


}
