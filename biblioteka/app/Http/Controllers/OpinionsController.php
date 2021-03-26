<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Book;

class OpinionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        if(\Auth::user() == null){
            return redirect()->route('home');
        }
        $opinions = Opinion::where('book_id',$id)->orderBy('created_at','desc')->get();
        $book = Book::findOrFail($id);
        return view('opinions',compact('opinions','book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user() == null){
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required|min:10|max:255',
        ]);

        $opinion = new Opinion();
        $opinion->user_id = \Auth::user()->id;
        $opinion->book_id = $id;
        $opinion->message = $request->message;

        if($opinion->save()){
            return redirect()->route('opinions',$id);
        }
        return redirect()->route('opinions',$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user() == null){
            return redirect()->route('home');
        }
        $opinion = Opinion::find($id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if (\Auth::user()->id != $opinion->user_id) {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        return view('opinionsEditForm', ['opinion'=>$opinion]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user() == null){
            return redirect()->route('home');
        }
        $this->validate($request, [
            'message' => 'required|min:10|max:255',
        ]);
        $opinion = Opinion::find($id);
        $book = Book::findOrFail($opinion->book_id);
        //Sprawdzenie czy użytkownik jest autorem komentarza
        if(\Auth::user()->id != $opinion->user_id)
        {
            return back()->with(['success' => false, 'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }
        $opinion->message = $request->message;
        if($opinion->save()) {
            return redirect()->route('opinions',$book->id);
        }
        return "Wystąpił błąd.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user() == null){
            return redirect()->route('home');
        }
        //Znajdź komentarz o danych id:
        $opinion = Opinion::find($id);
        $book = Book::findOrFail($opinion->book_id);
        //Sprawdz czy użytkownik jest autorem komentarza:
        if(\Auth::user()->id != $opinion->user_id)
        {
            return back();
        }
        if($opinion->delete()){
            return redirect()->route('opinions',$book->id);
        }
        else return back();

    }
}
