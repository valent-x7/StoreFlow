<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    //
    public function __invoke()
    {
        $expenses = Expense::where('user_id', Auth::id())->get();
        return view('expenses', compact('expenses'));
    }

    public function createExpense(Request $request)
    {
        // Validar datos
        $request->validate([
            'name' => ['string', 'required', 'max:50'],
            'description' => ['nullable', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'created_at' => ['nullable', 'date'],
        ]);

        // Crear nuevo egreso
        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->description = $request->input('description');
        $expense->created_at = $request->input('created_at');
        $expense->amount = $request->input('amount');
        $expense->user_id = Auth::id(); // Asignar id del usuario

        // Guardar egreso
        $expense->save();

        // Mensaje de exito
        return redirect()->route('expenses')->with('success', 'Egreso agregado exitosamente');
    }

    // Borrar egreso
    public function destroy(Expense $expense)
    {
        $expense->delete();
        // Mensaje de exito
        return redirect()->route('expenses')->with('success', 'Egreso eliminado exitosamente!');
    }

    public function edit(Expense $expense)
    {
        return view('edit-expense', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
        // Valida los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'created_at' => 'nullable|date',
        ]);

        // Actualiza el egreso
        $expense->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'created_at' => $request->input('created_at'),
            'amount' => $request->input('amount'),
        ]);

        // Redirige a egresos
        return redirect()->route('expenses')->with('success', 'Egreso actualizado exitosamente!');
    }
}
