<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();

        return Inertia::render('Dashboard', [
            'totalCustomers' => $totalCustomers
        ]);
    }
}
