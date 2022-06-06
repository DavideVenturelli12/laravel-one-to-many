<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    // prende una stringa come input e ritorna uno slug univoco
    public static function convertToSlug($title){
        $slugPrefix = Str::slug($title);
        $slug = $slugPrefix;
        $postFound = Post::where('slug', $slug)->first();
        $counter = 1;

        while ($postFound) {
            $slug = $slugPrefix . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
