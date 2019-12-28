<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller {

    public function index($category_id) {
        $books = Book::where('category_id', $category_id)->paginate(15);
        $books_count = $books->count();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('category.index', ['books' => $books, 'books_count' => $books_count, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

}
