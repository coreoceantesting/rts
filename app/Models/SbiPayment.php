<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SbiPayment extends Model
{
    use HasFactory;

    const PAYMENT_STATUS_PENDING = '0';
    const PAYMENT_STATUS_SUCCESSFUL = '1';
    const PAYMENT_STATUS_FAILED = '2';

    protected $fillable = ['orderno', 'amount', 'service_id', 'table_id', 'fees_id', 'status', 'details'];

    public function services()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }

    public function generateOrderNo()
    {
        $orderNo = '';
        if($this->orderno == '' || $this->orderno == 1)
        {
            do{
                $orderNo = 'MRTS'.date('m').date('d').sprintf("%05d", mt_rand(10000, 99999));
            }
            while($this->where('orderno', $orderNo)->exists());
            $this->orderno = $orderNo;
            $this->save();
        }
        else
        {
            $orderNo = $this->orderno;
        }

        return $orderNo;
    }
}
