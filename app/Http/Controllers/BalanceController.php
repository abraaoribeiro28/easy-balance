<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoneyFormRequest;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class BalanceController extends Controller
{
    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(Request $request)
    {
        $request['value'] = str_replace(".", "", $request['value']);
        $request['value'] =  (float) str_replace(",", ".", $request['value']);

        Validator::make($request->all(), [
            'value' => 'required|numeric|min:0.01'
        ])->validate();

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success'])
            return redirect()
                ->route('dashboard')
                ->with('success', $response['message']);

        return redirect()
            ->route('dashboard')
            ->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(Request $request)
    {
        $request['value'] = str_replace(".", "", $request['value']);
        $request['value'] =  (float) str_replace(",", ".", $request['value']);

        Validator::make($request->all(), [
            'value' => 'required|numeric|min:0.01'
        ])->validate();

        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if ($response['success'])
            return redirect()
                ->route('dashboard')
                ->with('success', $response['message']);

        return redirect()
            ->route('dashboard')
            ->with('error', $response['message']);
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }
 
    public function confirmTransfer(Request $request)
    {
        $request['value'] = str_replace(".", "", $request['value']);
        $request['value'] =  (float) str_replace(",", ".", $request['value']);

        Validator::make($request->all(), [
            'value' => 'required|numeric|min:0.01'
        ])->validate();

        
    }

    public function getUsers(Request $request)
    {
        $user = User::select(['id', 'name', 'image_path', 'email'])
            ->where('email', $request->email)->get();

        return response()->json($user);
    }
}
