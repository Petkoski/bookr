<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    //
    protected $table = 'author_book';
    protected $fillable = ['author_id', 'book_id'];
    public $timestamps = false;
}
