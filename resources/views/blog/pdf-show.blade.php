<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Post</title>
</head>

<body>
    <hr>
    <h3>{{ ucfirst($blogPost->title) }}</h3>
    <p>
        {!! $blogPost->body !!}
    </p>
    <p>@lang('lang.text_author'): {{ $blogPost->blogHasUser->nom }}</p>
    <hr>
</body>

</html>