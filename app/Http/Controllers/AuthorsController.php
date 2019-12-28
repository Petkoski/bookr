<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Category;

class AuthorsController extends Controller {

    public function index() {
        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        $authors = Author::orderBy('name', 'asc')->paginate(12);

        return view('authors.index', ['authors' => $authors, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }

    public function search() {
        $newest_releases = Book::orderBy('id', 'desc')->take(5)->get();
        $newest_releases_count = $newest_releases->count();

        $authors = Author::where('name', 'like', '%'.Input::get('query').'%')->orderBy('name', 'asc')->paginate(12);

        return view('authors.index', ['authors' => $authors, 'newest_releases' => $newest_releases, 'newest_releases_count' => $newest_releases_count]);
    }


    public function src(Request $request) {
        $output = "";

        if($request->ajax()) {
            $authors = Author::where('name', 'LIKE', '%'.$request->search.'%')->orderBy('name', 'asc')->paginate(12);
        }

        foreach($authors as $author) {
            if(file_exists('authors-images/'.$author->id.'.jpg')) {
                $output.=
                    "<div class=\"col-md-2\" style=\"margin-bottom: 20px\">".
                    "<img class=\"profile-user-img img-responsive img-circle\" src=\"/BookLibrary/public/authors-images/".$author->id.".jpg\" alt=\"User profile picture\">".
                    "<a href=\"/BookLibrary/public/author/".$author->id."\">".
                    "<p class=\"\" style=\"font-size: 12pt; text-align: center; color: #333333\">".$author->name."</p>".
                    "</a>".
                    "</div>";
            }
            else {
                $output.=
                    "<div class=\"col-md-2\" style=\"margin-bottom: 20px\">".
                    "<img class=\"profile-user-img img-responsive img-circle\" src=\"/BookLibrary/public/authors-images/0.jpg\" alt=\"User profile picture\">".
                    "<a href=\"/BookLibrary/public/author/".$author->id."\">".
                    "<p class=\"\" style=\"font-size: 12pt; text-align: center; color: #333333\">".$author->name."</p>".
                    "</a>".
                    "</div>";
            }

        }

        return Response($output);
    }

}
