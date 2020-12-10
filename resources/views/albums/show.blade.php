@extends('layouts.app')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $album->name }}</h1>
            <p class="lead text-muted">{{ $album->description }}</p>
            <p>
                <a href="{{ route('photos.create', $album) }}" class="btn btn-primary my-2">Upload Photos</a>
                <a href="{{ route('albums.home') }}" class="btn btn-secondary my-2">Go Back</a>
            </p>
        </div>
    </div>
</section>

<div class="album py-4">
    @if ($album->photos->count())
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($album->photos as $photo)
                <div class="col">
                    <div class="card shadow-sm">
                        <div style="height: 200px;">
                            <img class="card-img-top overflow-hidden" src="/storage/album_photos/{{ $album->id }}/{{ $photo->photo }}" alt="{{ $photo->title }}" />
                        </div>

                        <div class="card-body bg-white">
                            <p class="card-title">{{ $photo->title }}</p>
                            <p class="card-text">{{ $photo->description }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('photos.show', $photo) }}" id="customLink">View</a>
                                <small class="text-muted">{{ $photo->size }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="col-md-6 mx-auto card card-body shadow-sm">
            <p class="text-muted mb-0">No photos in this album yet!</p>
        </div>
    @endif
</div>
@endsection