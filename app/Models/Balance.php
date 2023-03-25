<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function deposit(float $value) : Array
    {
        $this->amount += number_format($value, 2, '.', '');
        $deposit = $this->save();

        if ($deposit) {
            return [
                'success' => true,
                'message' => 'Depósito realizado com sucesso.'
            ];
        }

        return [
            'success' => false,
            'message' => 'Falha ao efetuar depósito.'
        ];
    }
}
