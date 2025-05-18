@extends('backend.client.layouts.layout')
@section('title', 'Photo')
@section('content')
    <img src="{{ asset('uploads/photos/'.$photo->image) }}" alt=""> <br>
    <h1>Title: {{ $photo->title }}</h1>
    <h1 class = "text-muted">Category: {{ $photo->category->title }}</h1>
    <p>{{ $photo->description }}</p>
    {{ $photo->created_at }}
@endsection