<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AapaleSarkarPaymentDetails extends Model
{
    use HasFactory;

    protected $fillable = ['client_code', 'service_id', 'application_no', 'payment_transaction_id', 'bank_ref_id', 'bank_ref_no', 'bank_id', 'payment_date', 'payment_status', 'total_amount'];
}
