<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(15);
        $books_count = Book::all()->count();
        $bestsellers = Book::orderBy('bestsellers_rank', 'asc')->take(3)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('library.index', ['books' => $books, 'books_count' => $books_count, 'bestsellers' => $bestsellers, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }
}
