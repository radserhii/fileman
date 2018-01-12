@extends('layouts.app')
@section('title', 'Upload files')
@section('content')
    <form action="{{route('upload_file')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Завантажити файл:</label>
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input type="file" id="exampleInputFile"  multiple name="file[]">
            @if(isset($msg))
                @foreach($msg as $message)
            <p class="help-block">{{$message}}</p>
                @endforeach
            @endif
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <div>
        @if(isset($files))
            @foreach($files as $filename)
                <ul><li><a href="{{asset('download/'.$filename)}}">{{$filename}}</a></li></ul>
            @endforeach
        @endif
    </div>
@endsection