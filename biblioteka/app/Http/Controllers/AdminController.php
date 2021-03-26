<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;

class AdminController extends Controller
{
    public function adminBooked(){

        $title = "Rezerwacje";
        $events = Event::where('status_id',1)->orderBy('updated_at', 'asc')->paginate(5);
        return view('eventsAdmin',compact('events','title'));
    }

    public function adminBorrowed(){
        $title = "Wypożyczenia";
        $events = Event::where('status_id',2)->orderBy('updated_at', 'asc')->paginate(5);
        return view('eventsAdmin',compact('events','title'));
    }

    public function adminHistory(){

        $title = "Historia";
        $events = Event::where('status_id',7)->orderBy('updated_at', 'desc')->paginate(5);
        return view('eventsAdmin',compact('events','title'));
    }
}
