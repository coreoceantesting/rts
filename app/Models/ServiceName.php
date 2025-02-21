<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceName extends Model
{
    use HasFactory;
    public function fees()
    {
        return $this->hasMany(Fees::class, 'service_id','service_name');
    }
 public function signature()
    {
        return $this->hasMany(Signature::class, 'service_id','service_name');
    }
}
