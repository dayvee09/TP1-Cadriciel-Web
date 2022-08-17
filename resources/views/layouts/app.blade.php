<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>

<body>
    @php $locale = session()->get('locale'); @endphp
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @guest
                    <a class="nav-link" href="{{ route('login')}}">@lang('lang.text_login')</a>
                    <a class="nav-link" href="{{ route('maisonneuve.create')}}">@lang('lang.text_registration')</a>
                    @else
                    <a class="nav-link" href="{{ route('logout')}}">Logout</a>
                    @endguest
                    <a class="nav-link @if($locale=='fr') text-primary @endif" href="{{ route('lang', 'fr')}}">Français</a>
                    <a class="nav-link @if($locale=='en') text-primary @endif" href="{{ route('lang', 'en')}}">English</a>
                    <a class="nav-link @if($locale=='en') text-primary @endif" href="{{ route('maisonneuve')}}">Liste des étudiants</a>
                    @if(Auth::check())
                    <a class="nav-link @if($locale=='en') text-primary @endif" href="{{ route('dashboard')}}">Dashboard</a>
                    @endif
                </div>
            </div>
            @if(session('success'))
            <span class="text-success">{{ session('success')}}</span>
            @endif
        </div>
    </nav>

    @yield('content')
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>