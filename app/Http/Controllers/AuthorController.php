<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Category;

class AuthorController extends Controller {

    public function index($author_id) {
        $name = DB::table('authors')->where('id', '=', $author_id)
            ->get();
        $books = DB::table('books')
            ->join('author_book', 'author_book.book_id', '=', 'books.id')
            ->where('author_book.author_id', '=', $author_id)
            ->orderBy('year', 'desc')
            ->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        $author = Author::where('id', $author_id)->first();

        return view('author.index', ['author' => $author,'books' => $books, 'name' => $name, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

}
