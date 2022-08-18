@extends('layouts.app')
@section('content')

<div class="text-danger m-4">@lang('lang.text_hello') {{ $name }}</div>
@php if (Auth::check()) {@endphp
<hr>
<div class="col-12 pt-2">
    <div class="row">
        <div class="col-8 m-auto">
            <div>
                <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light btn-success m-4">
                    <a class="text-white" href="{{ route('maisonneuve.show', $id) }}">@lang('lang.text_consult_profil')</a>
                </button>
            </div>
            <div>
                <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light btn-success m-4">
                    <a class="text-white" href="{{ route('blog') }}">@lang('lang.text_consult_articles_students')</a>
                </button>
            </div>
            <div>
                <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light btn-success m-4">
                    <a class="text-white" href="{{ route('blogs', $id) }}">@lang('lang.text_consult_articles_me')</a>
                </button>
            </div>
            <div>
                <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light btn-success m-4">
                    <a class="text-white" href="{{ route('repertoire') }}">@lang('lang.text_view_files')</a>
                </button>
            </div>
        </div>
        <div class="col-4">
            <a href="{{ route('blog.create')}}" class="btn btn-primary btn-sm btn-success">@lang('lang.text_add_new_message')</a>
            <a href="{{ route('repertoire.create')}}" class="btn btn-primary btn-sm btn-success">@lang('lang.text_add_file')</a>
        </div>
    </div>
</div>
@php } @endphp
@endsection