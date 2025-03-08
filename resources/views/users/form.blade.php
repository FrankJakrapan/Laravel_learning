@extends('layout')

@section('content')

<h1>User Form</h1>

    @if (@isset($errors))
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ui>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ui>
            </div>
        @endif
    @endif

<form 
    @if (isset($id))
        action="/users/{{$id}}"
    @else
        action="/users"
    @endif
    method="post"
>

    @csrf
    @if (isset($id))
        @method('put')
    @endif

    <div>Name</div>
    <input type="text" class="form-control" value="{{$name}}" name="name" placeholder="Name">
    @if (isset($errors))
        @if ($errors->has('name'))
            <div class="text-danger">{{$errors->first('name')}}</div>
        @endif
    @endif

    <div class="mt-3">Email</div>
    <input type="text" class="form-control" value="{{$email}}" name="email" placeholder="Email">
    @if (isset($errors))
        @if ($errors->has('email'))
            <div class="text-danger">{{$errors->first('email')}}</div>
        @endif
    @endif

    <div class="mt-3">Password</div>
    <input type="password" class="form-control" value="{{$password}}" name="password" placeholder="Password">
    @if (isset($errors))
        @if ($errors->has('password'))
            <div class="text-danger">{{$errors->first('password')}}</div>
        @endif
    @endif

    <div class="mt-3">
        <button class="btn btn-success" type="submit">
            <i class="fa-solid fa-check me-2"></i>
            Save
        </button>
    </div>
</form>

@endsection