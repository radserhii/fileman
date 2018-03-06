@extends('layouts.app')
@section('title', 'Confirm')
@section('content')
    <div class="container text-center">
        <h2 class="text-danger">Ви впевненні?</h2>
        <a href="{{route('delete_user',['user' => $user])}}" class="btn btn-danger">Так</a>php
        <a href="{{route('delete_user',['user' => $user])}}" class="btn btn-primary">Ні</a>
    </div>
@endsection
