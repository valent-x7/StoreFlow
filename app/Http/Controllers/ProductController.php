<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $product->quantity = $request->input('quantity');
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

    // Mostrar vista para editar producto
    public function edit(Product $product)
    {
        return view('edit-product', compact('product'));
    }

    // Actualizar
    public function update(Request $request, Product $product)
    {
        // Valida los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Actualiza el producto
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        // Redirige a productos
        return redirect()->route('products.edit', $product->id)->with('success', 'Producto actualizado exitosamente!');
    }
}
