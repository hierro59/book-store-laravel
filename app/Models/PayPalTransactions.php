<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayPalTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        "pp_transaction_id",
        "pp_status",
        "cu_email_address",
        "cu_account_id",
        "cu_name",
        "tp_reference_id",
        "pp_payments_id",
        "pp_payments_status",
        "pp_payments_amount",
        "pp_payments_currency_code",
        "pp_payments_paypal_fee",
        "pp_payments_net_amount",
        "pp_payments_create_time",
        "pp_payments_update_time",
        "pp_response",
        'created_at',
        'updated_at'
    ];
}
