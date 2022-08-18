@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="display-4">@lang('lang.text_modify_student')</h1>
            <a href="{{ route('maisonneuve.show', $etudiant->id) }}" class="btn btn-primary btn-sm">Retourner</a>
            <hr>
            <div class="card mt-5">
                <div class="card-header">Étudiant</div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div clas="row">
                            <div class="control-group">
                                <label for="nom">@lang('lang.text_new_name')</label>
                                <input type="text" name="nom" id="nom" class="form-control mt-2" value="{{$etudiant->nom}}">
                                @if($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label for="adresse">@lang('lang.text_new_address')</label>
                                <input type="text" name="adresse" id="adresse" class="form-control mt-2" value="{{$etudiant->adresse}}">
                                @if($errors->has('adresse'))
                                <span class="text-danger">{{ $errors->first('adresse')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label for="phone">@lang('lang.text_new_phone')</label>
                                <input type="tel" name="phone" id="phone" class="form-control mt-2" value="{{$etudiant->phone}}">
                                @if($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label for="ddn">@lang('lang.text_new_birthday')</label>
                                <input type="date" name="ddn" id="ddn" class="form-control mt-2" value="{{$etudiant->ddn}}">
                                @if($errors->has('ddn'))
                                <span class="text-danger">{{ $errors->first('ddn')}}</span>
                                @endif
                            </div>
                            <div class="control-group">
                                <label for="ville_id">@lang('lang.text_new_city')</label>
                                <select name="ville_id" id="ville_id" class="form-control mt-2">
                                    @foreach ($villes as $ville)
                                    @if ( $etudiant->ville_id === $ville->id )
                                    <option value="{{$ville->id}}" selected>{{$ville->nom}}</option>
                                    @else
                                    <option value="{{$ville->id}}">{{$ville->nom}}</option>
                                    @endif
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