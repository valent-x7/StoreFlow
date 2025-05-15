<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    //
    public function __invoke()
    {
        // Pasar los ingresos del usuario actual
        $incomes = Income::where('user_id', Auth::id())->get();
        return view('incomes', compact('incomes'));
    }

    public function createIncome(Request $request)
    {
        // Validar los datos
        $request->validate([
            'name' => ['string', 'required', 'max:50'],
            'description' => ['nullable', 'string'],
            'amount' => ['required', 'numeric', 'min:0']
        ]);

        // Crear nuevo ingreso
        $income = new Income();
        $income->name = $request->input('name');
        $income->description = $request->input('description');
        $income->amount = $request->input('amount');
        $income->user_id = Auth::id(); // Asignar id del usuario

        // Guardar ingreso
        $income->save();

        // Mensaje de exito
        return redirect()->route('incomes')->with('success', 'Ingreso agregado exitosamente');
    }

    // Borrar ingreso
    public function destroy(Income $income)
    {
        $income->delete();
        // Mensaje de exito
        return redirect()->route('incomes')->with('success', 'Ingreso eliminado exitosamente!');
    }

    public function edit(Income $income)
    {
        return view('edit-income', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        // Valida los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
        ]);

        // Actualiza el ingreso
        $income->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
        ]);

        // Redirige a ingresos
        return redirect()->route('incomes')->with('success', 'Ingreso actualizado exitosamente!');
    }
    
    // Añadir ingreso desde un producto
    public function productToIncome(Request $request, Product $product)
    {
        // Validar datos
        $request->validate([
            'quantity_to_income' => ['required', 'integer', 'min:1', 'max:' . $product->quantity],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        DB::beginTransaction();

        try {
            $quantityToIncome = $request->input('quantity_to_income');
            $totalAmount = $quantityToIncome * $request->input('price');

            // Crear el nuevo ingreso
            $income = new Income();
            $income->name = $request->input('name');
            $income->description = $request->input('description');
            $income->amount = $totalAmount;
            $income->user_id = Auth::id();
            $income->save();

            // Reducir la cantidad del producto
            $product->decrement('quantity', $quantityToIncome);

            // Commitear la transacción si todo salió bien
            DB::commit();

            // Redirigir con mensaje de éxito
            return redirect()->route('incomes')->with('success', 'Ingreso añadido y cantidad de producto actualizada.');

        }
        catch (\Exception $e)
        {
            // Si ocurre algún error, hacer rollback de la transacción
            DB::rollBack();
            return redirect()->back()->with('error', 'Hubo un error al añadir el ingreso y actualizar la cantidad del producto.');
        }
    }

}
