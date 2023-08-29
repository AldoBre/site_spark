<?php

namespace App\Http\Controllers;

use App\Models\ImagenBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = ImagenBanner::pluck('image_banner');
        return response()->json($images);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_banner' => 'required|file|image|max:1024',
        ]);

        $existingImage = ImagenBanner::first();

        if($existingImage){
            if($existingImage->image_banner){
                Storage::disk('public')->delete($existingImage->image_banner);
            }
            $image = $existingImage;
        } else {
            $image = new ImagenBanner;
        }

        if($request->hasFile('image_banner')){
            $imagePath = $request->file('image_banner')->store('image_folder', 'public');
            if (!$imagePath) {
                return response()->json(['message' => 'Erro ao salvar a imagem.'], 500);
            }
            $image->image_banner = $imagePath;
        }

        $image->save();

        return response()->json(['message' => 'Imagem adicioanda com sucesso.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ImagenBanner $imagenBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenBanner $imagenBanner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImagenBanner $imagenBanner)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenBanner $imagenBanner)
    {
        $imagenBanner->delete();

        return response()->json(['message' => 'Imagem excluída com sucesso']);
    }
}
