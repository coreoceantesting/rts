<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SbiPayment extends Model
{
    use HasFactory;
    
    protected $fillable = ['orderno', 'amount', 'service_id', 'table_id', 'fees_id', 'status', 'details'];

    public function services()
    {
        return $this->hasMany(Service::class, 'service_id', 'id');
    }
}
