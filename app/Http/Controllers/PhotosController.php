<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create(Album $album)
    {
        if (!$album) {
            return redirect()->route('home');
        }

        return view('photos.create', [
            'album' => $album
        ]);
    }

    public function store(Request $request, Album $album)
    {
        $this->validate($request, [
            'title' => 'required|max:128',
            'description' => 'required|max:1024',
            'photo' => 'required|image'
        ]);

        $filenameWithExtension = $request->file('photo')->getClientOriginalName();
        $extension = $request->file('photo')->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $filenameToStore = time() . '_' . uniqid() . '_' . $filename . '.' . $extension;

        $request->file('photo')->storeAs('public/album_photos/' . $album->id, $filenameToStore);

        Photo::create([
            'album_id' => $album->id,
            'title' => $request->title,
            'description' => $request->description,
            'size' => $request->file('photo')->getSize(),
            'photo' => $filenameToStore
        ]);

        return redirect()->route('albums.show', $album->id)->with('info', 'Photo successfully uploaded!');
    }

    public function show(Photo $photo)
    {
        if (!$photo) {
            return redirect()->route('albums.home');
        }

        return view('photos.show', [
            'photo' => $photo
        ]);
    }

    public function destroy(Photo $photo)
    {
        if (!$photo) {
            return redirect()->route('albums.home');
        }

        if (Storage::delete('public/album_photos/' . $photo->album_id . '/' . $photo->photo)) {
            $photo->delete();

            return redirect()->route('albums.home')->with('info', 'Photo deleted!');
        }
    }
}
