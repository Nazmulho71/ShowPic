@extends('layouts.app')

@section('content')
    <h3 class="font-weight-bold">{{ $photo->title }}</h3>
    <p class="mb-1">{{ $photo->description }}</p>

    <form action="{{ route('photos.destroy', $photo) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete Photo" class="btn btn-danger">
        <a href="{{ route('albums.show', $photo->album->id) }}" class="btn btn-info">Go Back</a>
    </form>

    <small class="text-muted">Size: {{ $photo->size }}</small> <br />

    <hr />
    <img class="w-100" src="/storage/album_photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}" />
    <hr />
@endsection