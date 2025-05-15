<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartsController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        // Preparar datos para la gráfica de ingresos por mes
        $incomesByMonth = Income::where('user_id', $user->id)
            ->selectRaw('SUM(amount) as total_income, YEAR(created_at) as year, MONTH(created_at) as month')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $ingresosLabels = [];
        $ingresosData = [];

        foreach ($incomesByMonth as $income) {
            $date = Carbon::createFromDate($income->year, $income->month, 1);
            $ingresosLabels[] = $date->format('F Y');
            $ingresosData[] = $income->total_income;
        }

        // Preparar datos para la gráfica de egresos por mes
        $expensesByMonth = Expense::where('user_id', $user->id)
            ->selectRaw('SUM(amount) as total_expense, YEAR(created_at) as year, MONTH(created_at) as month')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $egresosLabels = [];
        $egresosData = [];

        foreach ($expensesByMonth as $expense) {
            $date = Carbon::createFromDate($expense->year, $expense->month, 1);
            $egresosLabels[] = $date->format('F Y');
            $egresosData[] = $expense->total_expense;
        }

        return view('charts', compact('ingresosLabels', 'ingresosData', 'egresosLabels', 'egresosData'));
    }

}
