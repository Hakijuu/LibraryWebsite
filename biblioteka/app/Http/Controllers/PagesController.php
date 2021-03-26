<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function search(Request $request)
    {
        $books = Book::where('title', 'LIKE', '%' . $request->q . '%')->paginate(10);
        if (count($books) > 0)
            return view('search',compact('books'))->withDetails($books)->withQuery($request->q);
        else
            return view('search',compact('books'))->withMessage('Nie znaleziono książki w bibliotece!');
    }

    public function catalog()
    {   $books = Book::paginate(10);
        return view('catalog', compact('books'));
    }

}
