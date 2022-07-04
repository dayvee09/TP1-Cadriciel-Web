@extends('layouts.app')
<!-- @section('title', 'titre personnalisé') -->
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
            <p><strong>Adresse:</strong> {!! $etudiant->adresse !!}</p>
            <p><strong>Email:</strong> {!! $etudiant->email !!}</p>
            <p><strong>Date de naissance: </strong>{!! $etudiant->ddn !!}</p>
            <p><strong>Numéro de téléphone: </strong>{!! $etudiant->phone !!}</p>
            <p><strong>Ville:</strong> {!! $ville->nom !!}</p>
            <hr>
            <a href="{{route('maisonneuve.edit', $etudiant->id)}}" class="btn btn-outline-primary">Modifier l'étudiant</a>
            <hr>
            <form method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection