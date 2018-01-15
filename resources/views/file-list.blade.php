@extends('layouts.app')
@section('title', 'Upload files')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{route('upload_form')}}">Завантаження</a></li>
        <li role="presentation" class="active"><a href="{{route('show_file')}}">Файли</a></li>
    </ul>
    <br><br>

    <table class="table table-striped">
        @if(isset($files))
            <tr>
                <th>Назва файлу</th>
                <th>Час заванаження</th>
                <th>Розмір файлу</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($files as $file)
                <tr>
                    <td>
                        {{$file[0]}}
                    </td>
                    <td>
                        {{$file[1]}}
                    </td>
                    <td>
                        {{$file[2]}}
                    </td>
                    <td>
                        <a href="{{asset('download/'.$file[0])}}" class="btn btn-success">Завантажити</a>
                    </td>
                    <td>
                        <a href="{{asset('remove/'.$file[0])}}" class="btn btn-danger">Видалити</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>

@endsection