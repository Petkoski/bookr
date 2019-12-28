<?php

namespace App\Http\Controllers;

use App\Author;
use App\AuthorBook;
use App\Book;
use App\User;
use App\Category;
use App\UserBook;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index() {
        if(Auth::user()->isAdministrator()) {
            $categories = Category::all();
            $authors = Author::all();
            $books = Book::all();
            $users = User::where('id', '!=', Auth::id())->get();
            $categories_count = $categories->count();

            $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
            $newest_releases_count = $newest_releases->count();

            return view('admin.index', ['users' => $users, 'books' => $books, 'categories' => $categories, 'categories_count' => $categories_count, 'authors' => $authors, 'action_message' => '', 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
        }
        else {
            return redirect('library');
        }
    }

    public function addanewbook() {
        $book_count = Book::all()->count();
        $new_id = $book_count+1;

        Book::create([
            'id' => $new_id,
            'name' => Input::get('name'),
            'format' => Input::get('format'),
            'dimensions' => Input::get('dimensions'),
            'publication_date' => Input::get('publication_date'),
            'year' => date('Ymd', strtotime(Input::get('publication_date'))),
            'publisher' => Input::get('publisher'),
            'publication_city' => Input::get('publication_city'),
            'language' => Input::get('language'),
            'isbn10' => Input::get('isbn13'),
            'isbn13' => Input::get('isbn10'),
            'bestsellers_rank' => Input::get('bestsellers_rank'),
            'price' => floatval(Input::get('price')),
            'category_id' => Input::get('category_id'),
            'remember_token' => null,
            'created_at' => null,
            'updated_at' => null,
            'description' => Input::get('description')
        ]);

        $a = Input::get('author_id');
        foreach ($a as $k => $v) {
            AuthorBook::create([
                'author_id' => $v,
                'book_id' => $new_id
            ]);
        }

        return redirect('admin')->with('status', 'The specified book was successfully added to the database.');
    }

    public function createanauthor() {
        $authors_count = Author::all()->count();
        $new_id = $authors_count+1;

        Author::create([
            'id' => $new_id,
            'name' => Input::get('name'),
            'description' => Input::get('description'),
            'remember_token' => null,
            'created_at' => null,
            'updated_at' => null
        ]);

        return redirect('admin')->with('status', 'The specified author was successfully added to the database.');
    }

    public function deleteanauthor() {
        $a = Input::get('author_id');
        foreach ($a as $k => $v) {
            Author::destroy($v);
        }

        if(count($a) == 1) {
            $action_message = 'The specified author was successfully deleted from the database.';
        }
        else {
            $action_message = 'The specified authors were successfully deleted from the database.';
        }

        return redirect('admin')->with('status', $action_message);
    }

    public function deleteabook() {
        $book_id = Input::get('book_id');
        $book = Book::where('id', $book_id)->first();
        foreach ($book->authors as $author) {
            AuthorBook::where('author_id', $author->id)->where('book_id', $book_id)->delete();
        }
        Book::destroy($book_id);

        return redirect('admin')->with('status', 'The specified book was successfully deleted from the database.');
    }

    public function deleteauser() {
        $user_id = Input::get('user_id');
        UserRole::where('user_id', $user_id)->where('role_id', 2)->delete();
        UserBook::where('user_id', $user_id)->delete();
        User::destroy($user_id);

        return redirect('admin')->with('status', 'The specified user was successfully deleted from the database.');
    }

}
