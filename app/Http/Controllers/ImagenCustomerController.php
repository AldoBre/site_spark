<?php

namespace App\Http\Controllers;

use App\Models\ImagenCustomer;
use Illuminate\Http\Request;

class ImagenCustomerController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'name.*' => 'required|string|max:255',
            'link.*' => 'required|string|max:255'
        ]);

        foreach($request->file('images') as $index => $image){
            $imagePath = $image->store('customer_images');

            ImagenCustomer::create([
                'name' => $request->names[$index],
                'link' => $request->link[$index],
                'image_custumer' => $imagePath,
            ]);
        }

        return response()->json(['message' => 'Clientes salvos com sucesso'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ImagenCustomer $imagenCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenCustomer $imagenCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImagenCustomer $imagenCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenCustomer $imagenCustomer)
    {
        //
    }
}
