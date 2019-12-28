<?php

namespace App\Http\Controllers;

use App\Book;
use App\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller {

    public function index($id) {
        $book = Book::where('id', $id)->get();

        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        return view('book.index', ['book' => $book, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

    public function addtocart() {
        $record = UserBook::where('user_id', '=', Auth::user()->id)->where('book_id', '=', intval(Input::get('book_id')))->first();
        if ($record === null) {
            UserBook::create([
                'user_id' => Auth::user()->id,
                'book_id' => intval(Input::get('book_id')),
                'quantity' => intval(Input::get('quantity')),
            ]);
        }
        else {
            $oldQuantity = UserBook::where('user_id', '=', Auth::user()->id)->where('book_id', '=', intval(Input::get('book_id')))->first()->quantity;

            UserBook::where('user_id', '=', Auth::user()->id)->where('book_id', '=', intval(Input::get('book_id')))->update(['quantity' => ($oldQuantity + intval(Input::get('quantity')))]);
        }

        return redirect('book/'.Input::get('book_id'))->with('status', 'The book was just added to your cart.');
    }

    public function removefromcart($book_id) {
        UserBook::where('user_id', '=', Auth::user()->id)->where('book_id', '=', $book_id)->delete();
        return redirect('cart')->with('status', 'The book (ID: '.$book_id.') was removed from your cart.');
    }
}
