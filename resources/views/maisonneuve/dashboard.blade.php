@extends('layouts.app')
@section('content')

hello {{ $name }}
@php if (Auth::check()) {@endphp
<hr>
<div>
    <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
        <a class="text-white" href="{{ route('maisonneuve.show', $id) }}">Consultez votre profil</a>
    </button>
</div>
<div>
    <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
        <a class="text-white" href="{{ route('blog') }}">Consultez tous les articles</a>
    </button>
</div>
<div>
    <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
        <a class="text-white" href="{{ route('blogs', $id) }}">Consultez vos articles</a>
    </button>
</div>
@php } @endphp
@endsection