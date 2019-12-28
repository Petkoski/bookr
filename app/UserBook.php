<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    //
    protected $table = 'user_book';
    protected $fillable = ['user_id', 'book_id', 'quantity'];
    public $timestamps = false;
}
