<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(ServiceName::class, 'service_name_id', 'id');
    }
    protected $table = 'signatures';

    protected $fillable = ['service_name_id','image'];
}
