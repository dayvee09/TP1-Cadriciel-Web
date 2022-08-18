@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="display-4">Modifier un fichier</h1>
            <div class="card mt-5">
                <div class="card-header">
                    fichier
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group">
                                <label for="title_fr">@lang('lang.text_title_fr')</label>
                                <input type="text" name="title_fr" id="title_fr" class="form-control mt-2" value="{{$repertoire->title_fr}}">
                            </div>
                            <div class="control-group">
                                <label for="title">@lang('lang.text_title_en')</label>
                                <input type="text" name="title" id="title" class="form-control mt-2" value="{{$repertoire->title}}">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Select your file</label>
                                <input class="form-control" type="file" name="url" id="url">
                            </div>

                            <div class="control-group">
                                <input type="submit" class="btn btn-success mt-2" value="@lang('lang.text_send')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection