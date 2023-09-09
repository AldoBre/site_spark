<?php

namespace App\Http\Controllers;

use App\Models\ImagenCarrousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenCarrouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = ImagenCarrousel::pluck('carrousel_images');
        return response()->json($images);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif',
            'image_3' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePaths = [];

        foreach (['image_1', 'image_2', 'image_3'] as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $imagePath = $request->file($fieldName)->store('carrousel_images');
                $imagePaths[$fieldName] = $imagePath;
            }
        }

        // Verificar se já existem registros no banco de dados
        $existingImages = ImagenCarrousel::first();

        if ($existingImages) {
            $existingImagePaths = json_decode($existingImages->image_carrousel, true);

            foreach ($existingImagePaths as $fieldName => $path) {
                if (array_key_exists($fieldName, $imagePaths)) {
                    // Excluir a imagem anterior
                    Storage::delete($path);
                }
            }

            // Atualizar o registro existente com as novas imagens
            $existingImages->update([
                'image_carrousel' => json_encode($imagePaths),
            ]);

            return response()->json(['message' => 'Imagens atualizadas com sucesso'], 200);
        } else {
            // Criar um novo registro caso não existam registros anteriores
            ImagenCarrousel::create([
                'image_carrousel' => json_encode($imagePaths),
            ]);

            return response()->json(['message' => 'Imagens salvas com sucesso'], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ImagenCarrousel $imagenCarrousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenCarrousel $imagenCarrousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImagenCarrousel $imagenCarrousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenCarrousel $imagenCarrousel)
    {
        //
    }
}
