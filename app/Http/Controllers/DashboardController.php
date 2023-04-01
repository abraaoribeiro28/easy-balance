<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0;

        $inputHistory = auth()->user()->historics
            ->where('type', 'I')
            ->pluck('amount');
        $inputs = $inputHistory->reduce(function ($carry, $number) {
            return $carry + $number;
        });

        $exitHistory = auth()->user()->historics
            ->whereIn('type', ['O', 'T'])
            ->pluck('amount');
        $exits = $exitHistory->reduce(function ($carry, $number) {
            return $carry + $number;
        });

        return view('admin.dashboard', compact('amount', 'inputs', 'exits'));
    }
}
