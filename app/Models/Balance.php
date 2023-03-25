<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function deposit(float $value): array
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'I',
            'amount' => $value,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd')
        ]);

        if ($deposit && $historic) {
            DB::commit();
            return [
                'success' => true,
                'message' => 'Depósito realizado com sucesso!'
            ];
        }

        DB::rollBack();
        return [
            'success' => false,
            'message' => 'Falha ao efetuar depósito!'
        ];
    }

    public function withdraw(float $value): array
    {
        if ($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Saldo insuficiente!'
            ];

        DB::beginTransaction();

        $totalBefore = $this->amount;
        $this->amount -= number_format($value, 2, '.', '');
        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type' => 'O',
            'amount' => $value,
            'total_before' => $totalBefore,
            'total_after' => $this->amount,
            'date' => date('Ymd')
        ]);

        if ($withdraw && $historic) {
            DB::commit();
            return [
                'success' => true,
                'message' => 'Saque realizado com sucesso!'
            ];
        }

        DB::rollBack();
        return [
            'success' => false,
            'message' => 'Falha ao efetuar o saque!'
        ];
    }
}
