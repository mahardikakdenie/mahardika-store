<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $income = Transaction::where('transaction_status', 'success')->sum('transaction_total');
        $sales = Transaction::count();
        $item = Transaction::orderBy('id', "DESC")->take(5)->get();
        $pie = [
            "pending" => Transaction::where('transaction_status', 'pending')->count(),
            "success" => Transaction::where('transaction_status', 'success')->count(),
            "failed" => Transaction::where('transaction_status', 'failed')->count(),
        ];
        return view('pages.dashboard')->with([
            "income" => $income,
            "sales" => $sales,
            "items" => $item,
            "pie" => $pie
        ]);
    }
}
