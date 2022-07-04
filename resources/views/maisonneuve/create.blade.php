@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="display-4">Créer un nouvel étudiant</h1>
            <div class="card mt-5">
                <div class="card-header">Nouvel étudiant</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div clas="row">
                            <div class="control-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="phone">Numéro de téléphone</label>
                                <input type="text" name="phone" id="phone" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="ddn">Date de naissance</label>
                                <input type="text" name="ddn" id="ddn" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="ville_id">Ville</label>
                                <select name="ville_id" id="ville_id" class="form-control mt-2">
                                    @foreach ($villes as $ville)
                                    <option value="{{$ville->id}}">{{$ville->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-2" value="Envoyer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection