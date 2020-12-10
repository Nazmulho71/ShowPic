@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="font-weight-bold text-center mb-4">Upload New Photo</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('photos.create', $album) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="col-form-label pt-0">{{ __('Title') }}</label>

                        <input id="title" type="text" class="form-control bg-light @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="off" value="{{ old('title') }}">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">{{ __('Description') }}</label>

                        <input id="description" type="text" class="form-control bg-light @error('description') is-invalid @enderror" name="description" autocomplete="off" value="{{ old('description') }}">

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="photo" class="col-form-label">{{ __('Photo') }}</label>

                        <input id="photo" type="file" class="form-control bg-light @error('photo') is-invalid @enderror" name="photo" autocomplete="off">

                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-0">
                        {{ __('Upload') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection