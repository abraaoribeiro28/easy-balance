<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use PhpParser\Node\Expr\Cast\Array_;
// use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    use HasFactory;

    public $timestamps = false;

    // public function deposit(float $value) : Array_
    // {
    //     DB::transaction(function () {

    //     }, 2);
    // }


    
}
