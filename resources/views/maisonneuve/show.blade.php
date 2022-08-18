@extends('layouts.app')
<!-- @section('title', 'titre personnalisé') -->
@php if (Auth::check() && Auth::user()->id == $etudiant->id) {@endphp
@section('content')
<div class="container">
    @php $imgCount = $imgCount % 10 @endphp
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('maisonneuve') }}" class="btn btn-primary btn-sm">@lang('lang.text_return')</a>
            <hr>
            <h1 class="display-one">{{ ucfirst($etudiant->nom) }}</h1>
            <img src={{asset('img/' . $imgCount . '.jpg')}} class="img-thumbnail" alt="user-profil">
            <hr>
            <p><strong>@lang('lang.text_new_address'):</strong> {!! $etudiant->adresse !!}</p>
            <p><strong>@lang('lang.text_new_mail'):</strong> {!! $email[0]->email !!}</p>
            <p><strong>@lang('lang.text_new_birthday'): </strong>{!! $etudiant->ddn !!}</p>
            <p><strong>@lang('lang.text_new_phone'): </strong>{!! $etudiant->phone !!}</p>
            <p><strong>@lang('lang.text_new_city'):</strong> {!! $ville->nom !!}</p>
            <hr>
            <a href="{{route('maisonneuve.edit', $etudiant->id)}}" class="btn btn-outline-primary">@lang('lang.text_modify_student')</a>
            <hr>
            <form method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">@lang('lang.text_delete_student')</button>
            </form>
        </div>
    </div>
</div>

@endsection
@php }
else { @endphp

@section('content')
<div class="container">
    @php $imgCount = $imgCount % 10 @endphp
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('maisonneuve') }}" class="btn btn-primary btn-sm">Retourner</a>
            <hr>
            <h1 class="display-one">{{ ucfirst($etudiant->nom) }}</h1>
            <img src={{asset('img/' . $imgCount . '.jpg')}} class="img-thumbnail" alt="user-profil">
            <hr>
            <p><strong>@lang('lang.text_new_address'):</strong> {!! $etudiant->adresse !!}</p>
            <p><strong>@lang('lang.text_new_mail'):</strong> {!! $email[0]->email !!}</p>
            <p><strong>@lang('lang.text_new_birthday'): </strong>{!! $etudiant->ddn !!}</p>
            <p><strong>@lang('lang.text_new_phone'): </strong>{!! $etudiant->phone !!}</p>
            <p><strong>@lang('lang.text_new_city'):</strong> {!! $ville->nom !!}</p>
        </div>
    </div>
</div>

@endsection

@php } @endphp