@extends('layouts.default')

@section('title', 'アップロード写真表示')
@section('content')
    @if(session()->has('success'))
        <p>{{ session('success')}}</p>
    @endif

    <img src="{{ asset('storage/photos/'.$filename )}}" alt="">

    <form action="{{ route('photos.destroy', ['photo' => $filename]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>

@endsection
