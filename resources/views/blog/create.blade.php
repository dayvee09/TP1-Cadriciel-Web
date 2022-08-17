@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <h1 class="display-4">@lang('lang.text_add_new_message')</h1>
            <div class="card mt-5">
                <div class="card-header">
                    @lang('lang.text_new_message')
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="control-group">
                                <label for="title_fr">@lang('lang.text_title_fr')</label>
                                <input type="text" name="title_fr" id="title_fr" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="body_fr">@lang('lang.text_message_fr')</label>
                                <textarea name="body_fr" id="body_fr" class="form-control mt-2"></textarea>
                            </div>
                            <div class="control-group">
                                <label for="title">@lang('lang.text_title_en')</label>
                                <input type="text" name="title" id="title" class="form-control mt-2">
                            </div>
                            <div class="control-group">
                                <label for="body">@lang('lang.text_message_en')</label>
                                <textarea name="body" id="body" class="form-control mt-2"></textarea>
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