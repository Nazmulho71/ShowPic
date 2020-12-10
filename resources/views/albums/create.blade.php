@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="font-weight-bold text-center mb-4">Create New Album</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <form method="POST" action="{{ route('albums.create') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label pt-0">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control bg-light @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="off" value="{{ old('name') }}">

                        @error('name')
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
                        <label for="cover_image" class="col-form-label">{{ __('Cover Image') }}</label>

                        <input id="cover_image" type="file" class="form-control bg-light @error('cover_image') is-invalid @enderror" name="cover_image" autocomplete="off">

                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mb-0">
                        {{ __('Create') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection