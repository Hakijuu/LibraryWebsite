@extends('layouts.main')
@section('content')
<div class="table-container  col-md-12">
    <div class="title">
        <h3>Opinie dla: {{$book->title}}</h3>
    </div>
    @auth
        <div class="table-container col-md-8">
            <div class="title"></div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-primary col-md-12">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form"  action="{{ route('store',$book->id) }}" id="comment-form"
                      method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('message')?'has-error':'' }} col-md-12" id="roles_box">
                                <label><b>Opinia</b></label> <br>
                                <textarea name="message" id="message" cols="20" rows="3" class="col-md-12 border border-warning rounded" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                    <div class="p-2"><button type="submit" class="btn btn-success mb-4 ml-3">Utwórz</button>
                    </div>
                    <div class="p-2"><a href="{{route('catalog')}}" class="btn btn-warning btn-md ml-5 mb-2">Wróć</a></div>
                    </div>
                </form>
            </div>
        </div>
            @if(count($opinions) == null)
                <h5>Nie ma dodanych opini do książki {{$book->title}}</h5>
            @else
            <table>
                <thead>
                <tr>
                    <th>Użytkownik</th>
                    <th>Data dodania</th>
                    <th>Komentarz</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
            @foreach($opinions as $opinion)
                <tr>
                    <td>{{$opinion->user->name}} {{$opinion->user->lastname}}</td>
                    <td>{{$opinion->created_at}}</td>
                    <td>{{$opinion->message}}</td>
                       <td> <br /> @if($opinion->user_id == \Auth::user()->id)
                            <a href="{{ route('edit', $opinion) }}" class="btn btn-warning btn-xs"
                               title="Edytuj"> Edytuj </a>
                            <a href="{{ route('delete', $opinion->id) }}"
                               class="btn btn-danger btn-xs"
                               onclick="return confirm('Jesteś pewien?')"
                               title="Skasuj"> Usuń
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <br>
    @endauth
</div>

@guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć komentarze.</b>
    </div>
@endguest
@endsection
