@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1 class="display-one mt-5">{{ config('app.name')}}</h1>
            <p>@lang('lang.text_welcome')</p>
            <a href="{{ route('maisonneuve') }}" class="btn btn-outline-primary">@lang('lang.text_access_website')</a>
        </div>
    </div>
</div>
@endsection