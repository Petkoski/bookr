<?php

namespace App\Http\Controllers;

use App\Author;
use App\AuthorBook;
use App\Book;
use App\Category;
use App\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function index() {
        $categories = Category::all();
        $authors = Author::all();
        $books = Book::all();
        $categories_count = $categories->count();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        date_default_timezone_set('Europe/Skopje');


        $products = UserBook::where('user_id', Auth::user()->id)->get();
        $books = DB::table('books')
            ->join('user_book', 'user_book.book_id', '=', 'books.id')
            ->where('user_book.user_id', '=', Auth::user()->id)
            ->get();
        $books_sum = $books->count();

        $products_sum = 0;
        foreach ($books as $book) {
            $products_sum += ($book->quantity*$book->price);
        }

        return view('cart.index', ['products' => $products, 'products_sum' => $products_sum, 'books' => $books, 'books_sum' => $books_sum,'categories' => $categories, 'categories_count' => $categories_count, 'authors' => $authors, 'action_message' => '', 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }
}
