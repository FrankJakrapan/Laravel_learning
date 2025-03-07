@extends('layouts.app')

@section('title', 'Frank')

@section('sidebar')
    @parent
    <p>Frank Sidebar</p>
@endsection

@section('content')
    <p>Frank Content</p>
@endsection