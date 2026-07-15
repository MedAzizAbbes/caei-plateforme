<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'country',
        'account_holder',
        'iban',
        'rib',
        'swift_code',
        'currency',
    ];
}
