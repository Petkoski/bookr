<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';
    protected $fillable = ['id', 'name', 'format', 'dimensions', 'publication_date', 'year',
        'publisher', 'publication_city', 'language', 'isbn10', 'isbn13',
        'bestsellers_rank', 'category_id', 'remember_token', 'created_at', 'updated_at', 'description', 'price'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function authors(){
        return $this->belongsToMany('App\Author');
    }
}
