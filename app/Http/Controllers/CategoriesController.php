<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoriesController extends Controller {

    public function index() {
        $categories = Category::all();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('categories.index', ['categories' => $categories,'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

}
