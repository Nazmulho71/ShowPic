@extends('layouts.app')

@section('content')
<div class="text-center mx-auto">
    <h1 class="font-weight-bold">Albums</h1>
</div>

<div class="album py-4">
    @if ($albums->count())
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($albums as $album)
                <div class="col">
                    <div class="card shadow-sm">
                        <div style="height: 200px;">
                            <img class="card-img-top overflow-hidden" src="/storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}" />
                        </div>

                        <div class="card-body bg-white">
                            <p class="card-text">{{ $album->description }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('albums.show', $album->id) }}" id="customLink">View</a>
                                <small class="text-muted">{{ $album->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="col-md-6 mx-auto card card-body shadow-sm">
            <p class="text-muted mb-0">No albums yet!</p>
        </div>
    @endif
</div>
@endsection