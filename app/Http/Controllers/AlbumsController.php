<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->get();

        return view('albums.index', [
            'albums' => $albums
        ]);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:128',
            'description' => 'required|max:1024',
            'cover_image' => 'required|image'
        ]);

        $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $filenameToStore = time() . '_' . uniqid() . '_' . $filename . '.' . $extension;

        $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        Album::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => $filenameToStore
        ]);

        return redirect()->route('albums.home')->with('info', 'Album successfully created!');
    }

    public function show($id)
    {
        $album = Album::with('photos')->find($id);

        return view('albums.show', [
            'album' => $album
        ]);
    }
}
