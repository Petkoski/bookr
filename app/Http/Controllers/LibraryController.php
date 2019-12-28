<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Category;

class LibraryController extends Controller
{
    public function index() {
        $books = Book::paginate(15);
        $books_count = Book::all()->count();
        //$bestsellers = Book::where('name', 'like', '%'.Input::get('query').'%')->orderBy('bestsellers_rank', 'asc')->limit(3);
        $bestsellers = Book::orderBy('bestsellers_rank', 'asc')->take(3)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('library.index', ['books' => $books, 'books_count' => $books_count, 'bestsellers' => $bestsellers, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

    public function search() {
        $books = Book::where('name', 'like', '%'.Input::get('query').'%')->paginate(15);

        $books_count = $books->count();
        $bestsellers = Book::orderBy('bestsellers_rank', 'asc')->take(3)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('library.index', ['books' => $books, 'books_count' => $books_count, 'bestsellers' => $bestsellers, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

    public function bestsellers_rank() {
        $books = Book::where('name', 'like', '%'.Input::get('query').'%')->orderBy('bestsellers_rank', 'asc')->paginate(15);
        $books_count = $books->count();
        $bestsellers = Book::orderBy('bestsellers_rank', 'asc')->take(3)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('library.index', ['books' => $books, 'books_count' => $books_count, 'bestsellers' => $bestsellers, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

    public function publication_date() {
        $books = Book::where('name', 'like', '%'.Input::get('query').'%')->orderBy('year', 'desc')->paginate(15);
        $books_count = $books->count();
        $bestsellers = Book::orderBy('bestsellers_rank', 'asc')->take(3)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('library.index', ['books' => $books, 'books_count' => $books_count, 'bestsellers' => $bestsellers, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

    public function id() {
        $books = Book::where('name', 'like', '%'.Input::get('query').'%')->orderBy('id', 'desc')->paginate(15);
        $books_count = $books->count();
        $bestsellers = Book::orderBy('bestsellers_rank', 'asc')->take(3)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('library.index', ['books' => $books, 'books_count' => $books_count, 'bestsellers' => $bestsellers, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }
}
