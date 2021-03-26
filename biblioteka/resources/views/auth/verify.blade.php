{{--@extends('layouts.app')--}}
@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj swój adres e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nowy link weryfikacyjny został wysłany na twój adres e-mail') }}
                        </div>
                    @endif

                    {{ __('Przed kontynuowaniem sprawdź swoją skrzynke pocztową') }}
                    {{ __('Jeśli nie otrzymałeś wiadomości') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknij tutaj aby wysłać następne') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
