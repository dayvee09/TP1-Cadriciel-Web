@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8 m-4">
                        <h1 class="display-one">@lang('lang.text_student_list')</h1>
                    </div>
                    <div class="row">
                        <div class="col-4 m-4">
                            <a href="{{ route('maisonneuve.create') }}" class="btn btn-primary btn-sm mt-5">@lang('lang.text_student_add')</a>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @php $postCount = 1 @endphp
                    @php $imgCount = 1 @endphp

                    <!-- Contrairement au forelse, le foreach ne donne pas la possibilité d'envoyer un message s'il n'y a pas de correspondance -->

                    @forelse($posts as $post)
                    <!-- 2e paramètre est le post id pour nous amener à l'article en question. Pratique quand on change de serveur et que les routes changent -->
                    @if ($postCount == 1)
                    <div class="row mt-5">
                        @endif
                        <div class="col-lg-4 mt-3">
                            <div class="text-center card-box">
                                <div class="member-card pt-2 pb-2">
                                    <div class="thumb-lg member-thumb mx-auto">
                                        @if ($imgCount == 11)
                                        @php $imgCount = 1 @endphp
                                        @endif
                                        <img src={{asset('img/' . $imgCount . '.jpg')}} class="img-thumbnail" alt="user-profil">
                                    </div>
                                    <div>
                                        <button class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">
                                            <a class="text-white" href="{{ route('maisonneuve.show', $post->id) }}">{{ ucfirst($post->nom) }}</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $postCount++ @endphp
                        @if ($postCount == 4)
                    </div>
                    @php $postCount == 1 @endphp
                    @endif
                    @php $imgCount++ @endphp
                    @empty
                    <div class="text-warning">@lang('lang.text_student_empty')</div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>
@endsection