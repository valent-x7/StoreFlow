<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function __invoke()
    {
        // Mostrar los productos del usuario actual
        $products = Product::where('user_id', Auth::id())->get();
        return view('products', compact('products'));
    }

    public function createProduct(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => ['string', 'required', 'max:50'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0']
        ]);

        // Crear instancia de producto
        $product = New Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->user_id = Auth::id(); // Asignar id del usuario

        // Guardar producto
        $product->save();
        
        // Mensaje de exito
        return redirect()->route('products')->with('success', 'Producto creado exitosamente');
    }

    // Borrar producto
    public function destroy(Product $product)
    {
        $product->delete();

        // Mensaje de exito
        return redirect()->route('products')->with('success', 'Producto eliminado exitosamente!');
    }

    public function edit(Product $product)
    {
        return view('edit-product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Valida los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Actualiza el producto
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        // Redirige a productos
        return redirect()->route('products')->with('success', 'Producto actualizado exitosamente!');
    }
}
