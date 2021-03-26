@extends('layouts.main')
@section('content')
   <div class="table-container col-md-12">
        <div class="title">
            <h3>Katalog</h3>
        </div>
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Tytuł</th>
                <th>Autor</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}} {{$book->author->lastname}}</td>
                    <td>@auth
                        <div class="d-flex flex-row">
                        @if(\App\Models\Book_copie::isAvaliable($book->id))
                            <div class="p-2">
                            <form role="form" method="GET" action="{{route('book',$book->id)}}">
                                <button type="submit" class="btn btn-success">Zarezerwuj</button>
                            </form>
                            </div>
                        @else  <div class="p-2"><a href="#" class="btn btn-succes disabled" title="Zarezerwuj"> Zarezerwuj </a></div>
                        @endif
                        <div class="p-2"><a href="{{route('opinions',$book->id)}}" class="btn btn-warning text-light" title="Opinie"> Opinie </a></div>
                        @csrf
                        </div>
                        @endauth</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
                {{ $books->links() }}
            </div>
        </div>
        <br>
   </div>
    @guest
        <div class="table-container col-md-12">
            <b>Zaloguj się aby móc przeglądać opinie i korzystać z usług biblioteki</b>
        </div>
    @endguest
@endsection
