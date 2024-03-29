@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('blogs', $blogPost->blogHasUser->id)}}" class="btn btn-primary btn-sm">@lang('lang.text_return')</a>
            <hr>
            @if ($title[0]->title == "")
            <div class="control-group">@lang('lang.text_no_traduction')</div>
            @else
            <h1 class="display-one">{{ ucfirst($title[0]->title) }}</h1>
            <p>{!! $body[0]->body !!}</p>
            <p>Auteur: {{ $blogPost->blogHasUser->nom }}</p>
            <a href="{{route('blog.showPdf', $blogPost->id)}}" class="btn btn-outline-warning">PDF</a>
            <hr>
            @if ( $blogPost->blogHasUser->id == Auth::user()->id )
            <a href="{{route('blog.edit', $blogPost->id)}}" class="btn btn-outline-primary">@lang('lang.text_modify_article')</a>
            <hr>
            <form method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">@lang('lang.text_delete_article')</button>
            </form>
            @else
            @endif
            <!-- @endif -->
        </div>
    </div>
</div>
@endsection