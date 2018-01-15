@extends('layouts.app')
@section('title', 'Upload files')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="{{route('upload_form')}}">Завантаження</a></li>
        <li role="presentation"><a href="{{route('show_file')}}">Файли</a></li>
    </ul>
    <br><br>
    <form action="{{route('upload_file')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="file"  multiple name="file[]">
            @if(isset($msg))
                @foreach($msg as $message)
            <p class="help-block">{{$message}}</p>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-success">Завантажити</button>
    </form>
@endsection