@extends('layouts.homeLayout')
@section('content')
    <div class="table-container col-md-12 py-4 mt-4">
        <div class="title">
            <h3>{{$title}}</h3>
        </div>
        @if(count($events) == null)
            <h5>Brak</h5>
        @else
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Data
                    @if($title =='Rezerwacje')
                        rezerwacji
                        @elseif($title =='Wypożyczenia')
                        wypożyczenia
                        @else oddania
                        @endif
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{$event->id}}</td>
                    <td>{{$event->book_copie->book->title}}</td>
                    <td>{{$event->book_copie->book->author->name}} {{$event->book_copie->book->author->lastname}}</td>
                    <td>{{$event->updated_at}}</td>
                    <td> @auth
                       @if($title == 'Rezerwacje')
                        <form role="form" method="POST" action="{{ route('cancel', $event->id) }}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-danger">Zrezygnuj</button>
                            </div>
                        </form>
                        @csrf
                            @endif
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-4" class="li: { list-style: none; }">
                {{ $events->links() }}
            </div>
        </div>
    </div>
    @endif
@endsection
