@extends('layout')

@section('content')
    <h3>Product Max Min Count Avg</h3>
    <div>Max: {{ $priceMax }}</div>
    <div>Min: {{ $priceMin }}</div>
    <div>Count: {{ $priceCount }}</div>
    <div>Avg: {{ $priceAvg }}</div>
@endsection