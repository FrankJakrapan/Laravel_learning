@extends('layout')

@section('content')
    <div class="container">
        <h1>Sign In</h1>

        @if (isset($errors))
            @if ($errors->has('search'))
                <div class="alert alert-danger">*** {{$errors->first('search')}}</div>
            @endif
        @endif

        <form action="/user/signInProcess" method="post">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            
                @if (isset($errors))
                    @if ($errors->has('email'))
                        <div class="text-danger">{{$errors->first('email')}}</div>
                    @endif
                @endif
            </div>

            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            
                @if (isset($errors))
                    @if ($errors->has('password'))
                        <div class="text-danger">{{$errors->first('password')}}</div>
                    @endif
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Sign In</button>
        </form>
    </div>
@endsection