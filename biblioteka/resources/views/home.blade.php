@extends('layouts.homeLayout')
@section('content')
    <div class="table-container col-lg-12 py-4 mt-4">
        <div class="title">
            <h3>Twoje dane:</h3>
        </div>
        <table>
            <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr><td>Imię i nazwisko</td><td>{{ $user->name }} {{ $user->lastname }}</td></tr>
            <tr><td>Ulica nr budynku/nr mieszkania</td><td>{{ $user->street}} / {{ $user->flat }}</td></tr>
            <tr><td>Kod pocztowy, miasto</td><td>{{ $user->postcode }} {{ $user->city }}</td></tr>
            <tr><td>Kraj</td><td>{{ $user->country }}</td></tr>
            <tr><td>E-mail</td><td>{{ $user->email }}</td></tr>
            <tr><td>Telefon</td><td>{{ $user->phone }}</td></tr>
            </tbody>
        </table>
        <br>
    </div>
@endsection
