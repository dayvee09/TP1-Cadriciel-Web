@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('repertoire')}}" class="btn btn-primary btn-sm">@lang('lang.text_return')</a>
            <hr>
            @if ($title[0]->title == "")
            <div class="control-group">@lang('lang.text_no_traduction')</div>
            @else
            <h1 class="display-one">{{ ucfirst($title[0]->title) }}</h1>
            <p><a href="{{ asset('/storage/fichiers/documents/'.$repertoire->url) }}">Download</a></p>
            <p>@lang('lang.text_author'): {{ $repertoire->repertoireHasUser->nom }}</p>
            <hr>
            @if ( $repertoire->repertoireHasUser->id == Auth::user()->id )
            <a href="{{route('repertoire.edit', $repertoire->id)}}" class="btn btn-outline-primary">@lang('lang.text_modify_file')</a>
            <hr>
            <form method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">@lang('lang.text_delete_file')</button>
            </form>
            @else
            @endif
            <!-- @endif -->
        </div>
    </div>
</div>
@endsection