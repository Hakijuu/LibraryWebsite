<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_copie extends Model
{
    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public static function isAvaliable($id){
        $book_copies = Book_copie::where('book_id',$id)->get();
        $temp=0;
        foreach ($book_copies as $book_copie){
            if($book_copie->status_id == 6)
                $temp++;
        }
        if($temp > 0)
            return true;
        else return false;
    }

    use HasFactory;
}
