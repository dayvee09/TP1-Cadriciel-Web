@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="row">
                <div class="col-8 m-lg-4">
                    <h1 class="display-one">@lang('lang.text_our_blog')</h1>
                </div>
                <div class="col-4 m-lg-4">
                    <a href="{{ route('blog.create')}}" class="btn btn-primary btn-sm">@lang('lang.text_add_new_message')</a>
                </div>
            </div>
            <ul>
                @php if($id){ @endphp
                @forelse($posts as $post)
                @php if($post->maisonneuves_id == Auth::user()->id) { @endphp
                @if ($titles[$loop->index]->title == "")
                <div class="control-group">@lang('lang.text_no_traduction')</div>
                @else
                <li> <a href="{{ route('blog.show', $post->id)}}">{{ ucfirst($titles[$loop->index]->title)}}</a></li>
                @endif
                @php } @endphp
                @empty
                <li class="text-warning">Aucun article disponible</li>
                @endforelse
                @php } else { @endphp
                @forelse($posts as $post)
                @if ($titles[$loop->index]->title == "")
                <div class="control-group">@lang('lang.text_no_traduction')</div>
                @else
                <li> <a href="{{ route('blog.show', $post->id)}}">{{ ucfirst($titles[$loop->index]->title)}}</a></li>
                @endif
                @empty
                <li class="text-warning">Aucun article disponible</li>
                @endforelse
                @php } @endphp
            </ul>
        </div>
    </div>
</div>
@endsection