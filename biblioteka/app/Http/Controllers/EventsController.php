<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Book_copie;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function book($id){
        if(\Auth::user() == null){
            return redirect()->route('home');
        }

        $book_copie = Book_copie::where('book_id',$id)->where('status_id','6')->first();

        $event = new Event();
        $event->user_id = \Auth::user()->id;
        $event->book_copie_id = $book_copie->id;
        $event->status_id = 1;
        $book_copie->status_id = 5;
        if($event->save() && $book_copie->save()){
            return redirect()->route('booked');
        }
        return redirect()->route('home');
    }

    public function cancel($id){
        $event = Event::find($id);
        $book_copie = Book_copie::where('id',$event->book_copie_id)->first();
        $book_copie->status_id = 6;

        if($event->delete() && $book_copie->save()){
            return redirect()->route('booked');
        }
        else return back();
    }

    public function borrow($id){
        if(\Auth::user() == null){
            return view('home');
        }

        if(!\Auth::user()->hasAnyRole('Admin')){
            return redirect()->route('home');
        }

        $event = Event::find($id);
        $event->status_id = 2;
        if($event->save()){
            return redirect()->route('adminBooked');
        }
        return redirect()->route('home');
    }

    public function return($id){
        if(\Auth::user() == null){
            return view('home');
        }

        if(!\Auth::user()->hasAnyRole('Admin')){
            return redirect()->route('home');
        }

        $event = Event::find($id);
        $event->status_id = 7;
        $book_copie = Book_copie::where('id',$event->book_copie_id)->first();
        $book_copie->status_id = 6;
        if($event->save() && $book_copie->save()){
            return redirect()->route('adminBorrowed');
        }
        return redirect()->route('home');
    }

    public function showBorrowed(){
        if(\Auth::user() == null){
            return view('home');
        }

        if(\Auth::user()->hasAnyRole('Admin')){
            return redirect()->route('adminBorrowed');
        }
        $title = "Wypożyczenia";
        $events = Event::where('user_id',\Auth::user()->id)->where('status_id',2)->paginate(5);

        return view('events',compact('events','title'));
    }

    public function showBooked(){
        if(\Auth::user() == null){
            return view('home');
        }

        if(\Auth::user()->hasAnyRole('Admin')){
            return redirect()->route('adminBooked');
        }

        $title = "Rezerwacje";
        $events = Event::where('user_id',\Auth::user()->id)->where('status_id',1)->paginate(5);
        return view('events',compact('events','title'));
    }

    public function showHistory(){
        if(\Auth::user() == null){
            return view('home');
        }

        if(\Auth::user()->hasAnyRole('Admin')){
            return redirect()->route('adminHistory');
        }

        $title = "Historia";
        $events = Event::where('user_id',\Auth::user()->id)->where('status_id',7)->paginate(5);
        return view('events',compact('events','title'));
    }


}
