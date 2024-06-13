<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TransactionHistoryController extends Controller
{
    public function view(Request $request)
    {
        if (!Session::has('user')) {
            // If not logged in, redirect to the login page
            return redirect()->route('login.submit')->withErrors([
                'auth' => 'You must be logged in to access this page.',
            ]);
        }
        return view("transaction-history");
    }

    public function show($id)
    {
        // Fetch transaction details based on ID
        $transaction = DB::table('TRANSACTIONS')
            ->join('USERS', 'TRANSACTIONS.USER_ID', '=', 'USERS.id')
            ->where('TRANSACTIONS.ID', $id)
            ->select('TRANSACTIONS.*', 'USERS.name', 'USERS.phone', 'USERS.address')
            ->first();

        if (!$transaction) {
            return redirect()->route('transaction.history')->with('error', 'Transaction not found.');
        }

        return view('transaction-detail', compact('transaction'));
    }
}

