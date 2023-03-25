<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoneyFormRequest;
use Illuminate\Http\Request;
use App\Models\Balance;

class BalanceController extends Controller
{
    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if($response['success'])
            return redirect()
                    ->route('dashboard')
                    ->with('success', $response['message']);

        return redirect()
            ->route('dashboard')
            ->with('error', $response['message']);
    }
}
