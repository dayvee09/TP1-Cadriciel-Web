@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <h1 class="display-4">Modifier un message</h1>
                <div class="card mt-5">
                    <div class="card-header">
                        Message
                    </div>
                    <div class="card-body">
                        <form method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="control-group">
                                    <label for="title">Titre</label>
                                    <input type="text" name="title" id="title" class="form-control mt-2" value="{{$blogPost->title}}">
                                </div>
                                <div class="control-group">
                                    <label for="body">Message</label>
                                    <textarea name="body" id="body" class="form-control mt-2">{{ $blogPost->body}}</textarea> 
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