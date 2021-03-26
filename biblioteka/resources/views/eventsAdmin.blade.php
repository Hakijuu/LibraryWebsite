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
                    <th>Status</th>
                    <th>ID Czytelnika</th>
                    <th>Czytelnik</th>
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
                    @if($title == 'Rezerwacje' || $title =='Wypożyczenia')
                    <th></th>
                        @endif
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->status->name}}</td>
                        <td>{{$event->user->id}}</td>
                        <td>{{$event->user->name}} {{$event->user->lastname}}</td>
                        <td>{{$event->book_copie->book->title}}</td>
                        <td>{{$event->book_copie->book->author->name}} {{$event->book_copie->book->author->lastname}}</td>
                        <td>{{$event->updated_at}}</td>
                        @auth
                            @if($title == 'Rezerwacje' || $title =='Wypożyczenia') <td>
                                @if($title =='Rezerwacje') <form role="form" method="GET" action="{{ route('borrow', $event->id) }}">
                                    {{ csrf_field() }}
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-danger">Wypożycz</button>
                                    </div>
                                </form>
                                @else
                                    <form role="form" method="GET" action="{{ route('return', $event->id) }}">
                                        {{ csrf_field() }}
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-danger">Zwrot</button>
                                        </div>
                                    </form>
                                @endif
                        </td>
                            @endif
                            @csrf
                    </tr>
                    @endauth
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
