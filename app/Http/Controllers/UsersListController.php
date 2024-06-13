<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsersListController extends Controller
{
    public function view()
    {
        return view("users-list");
    }

    public function index(Request $request)
    {
        if (!Session::has('user')) {
            // If not logged in, redirect to the login page
            return redirect()->route('login.submit')->withErrors([
                'auth' => 'You must be logged in to access this page.',
            ]);
        }

        $sortColumn = $request->get('sort', 'user_id'); // Default sort column
        $sortDirection = $request->get('direction', 'asc'); // Default sort direction

        // Retrieve users and their transaction data using raw queries, excluding admins
        $users = DB::table('USERS')
            ->leftJoin('TRANSACTIONS', 'USERS.USER_ID', '=', 'TRANSACTIONS.USER_ID')
            ->select(
                'USERS.USER_ID as user_id',
                'USERS.USER_NAME as name',
                'USERS.USER_EMAIL as email',
                DB::raw('COUNT(TRANSACTIONS.USER_ID) as total_transactions'),
                DB::raw('MAX(TRANSACTIONS.TRANS_DATE) as last_transaction_date'),
                'USERS.USER_ADMIN as is_admin'
            )
            ->where('USERS.USER_ADMIN', '=', 0) // Only include non-admin users
            ->groupBy('USERS.USER_ID', 'USERS.USER_NAME', 'USERS.USER_EMAIL', 'USERS.USER_ADMIN')
            ->orderBy($sortColumn, $sortDirection)
            ->get();

        $totalUsers = DB::table('USERS')->where('USER_ADMIN', '=', 0)->count('USER_ID');

        return view('users-list', [
            'users' => $users,
            'sort' => $sortColumn,
            'direction' => $sortDirection,
            'totalUsers' => $totalUsers
        ]);
    }
}
