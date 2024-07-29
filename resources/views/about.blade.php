@extends('layouts.app')
@section('title', 'About')
@section('content')
    <h1>About us</h1>
    <hr>
    <p>Developer : {{ $name }}</p>
    <p>Date : {{ $date }}</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptates.</p>
@endsection
