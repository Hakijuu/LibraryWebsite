@extends('layouts.main')
@section('content')
    <div class="col-md-8 mb-5">
        <h1>Strona główna</h1>
        <h5>
            Witaj! Znalazłeś się na internetowej stronie naszej miejskiej biblioteki.
        </h5>
        <p>
            Załóż konto by móc w pełni cieszyć się możliwościami jakie oferuje ci nasza biblioteka. Dla wszystkich użytkowników dodane są opcje rezerwacji książki, również jej anulowania,
            a także przeglądanie historii wypożyczeń. Dodatkowo każdy użtkownik po przeczytaniu wypożyczonej książki może podzielić się opinią na jej temat, bądź przeczytać opinie innych
            jeśli nie jest pewny co do wypożyczenia danej pozycji. Jeśli nie masz jeszcze konta nie zwlekaj dlużej!
        </p>
    </div>
    @include('layouts.contact')
@endsection
