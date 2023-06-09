<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\Iterator\FilenameFilterIterator;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $savedFilePath = $request->file('image')->store('photos', 'public');
        Log::debug($savedFilePath);
        $filename = pathinfo($savedFilePath, PATHINFO_BASENAME);
        Log::debug($filename);
        return to_route('photos.show', ['photo' => $filename] )->with('success','アップロードしました。');
    }

    /**
     * Display the specified resource.
     */
    //画像の表示
    public function show($filename)
    {
        return view('photos.show', ['filename' => $filename]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    //アップロードした写真の削除
    public function destroy($filename)
    {
        Storage::disk('public')->delete('photos/'.$filename);
        return to_route('photos.create')->with('success','削除しました。');
    }

    public function download($filename)
    {
        return Storage::disk('public')->download('photos/'.$filename, 'アップロード.jpg');
    }
}
