@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{route('dashboard')}}">Реєстрація користувача</a></li>
        <li role="presentation" class="active"><a href="{{route('dashboard_users')}}">Користувачі</a></li>
    </ul>
    <br><br>
    <table class="table table-striped">
        @if(isset($users))
            <tr>
                <th>І'мя</th>
                <th>Email</th>
                <th>Дата реєстрації</th>
                <th></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->created_at}}
                    </td>
                    <td>
                        <a href="{{route('confirmDeleteUser',['user' => $user])}}" class="btn btn-danger">Видалити Користувача</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection