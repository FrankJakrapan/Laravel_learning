@extends('layout')

@section('content')
    <h3>Profile</h3>
    <div>Id: {{ $user->id }}</div>
    <div>Name: {{ $user->name }}</div>
    <div>Email: {{ $user->email }}</div>
@endsection