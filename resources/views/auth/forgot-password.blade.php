@extends('layouts.app')
@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header text-center">Forgot password</h3>
                    <div class="card-body">
                        @if(session('success'))
                            <h4 class="text-success">{{ session('success')}}</h4>
                        @endif
                        @if($errors)             
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">     
                                <strong>{{ $error }}</strong><br>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            @endforeach
                            
                        @endif
                        <form action="{{ route('temp.password')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" placeholder="username" name="email" class="form-control">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-primary"> Forgot Password</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
